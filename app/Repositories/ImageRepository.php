<?php namespace App\Repositories;


use Admin\General\Models\ImagesModel;
use Illuminate\Support\Str;


class ImageRepository {

    public function save($request, $element, $type = 'gallery', $path = 'uploads/images/')
    {
        ini_set('memory_limit','512M');


        foreach ($request as $image) {

            if (is_null($image) || !$image->isValid()) continue;

            $destinationPath = storage_path($path);

            $oldFile = pathinfo($image->getClientOriginalName());
            $fileName = strtolower(Str::slug($oldFile['filename'])) . time() . uniqid() . '.' . strtolower($image->getClientOriginalExtension());

            $image->move($destinationPath, $fileName);

            $image = new ImagesModel();
            $image->path = $fileName;
            $image->alt = '';
            $image->type = $type;
            $image->description = '';
            $image->last_update = date('Y-m-d');

            $element->images()->save($image);
        }

    }

    public function update($request, $element, $type = 'gallery', $path = 'uploads/images/')
    {

        $requestImage = $request['new_image'];

        if (is_null($requestImage) || !$requestImage->isValid()) return;

        $destinationPath = storage_path($path);

        $oldFile = pathinfo($requestImage->getClientOriginalName());
        $fileName = strtolower(Str::slug($oldFile['filename'])) . time() . uniqid() . '.' . strtolower($requestImage->getClientOriginalExtension());

        $requestImage->move($destinationPath, $fileName);

        $image = ImagesModel::where('id', $request['image_id'])->first();

        //dd($image);

        $image->path = $fileName;
        $image->alt = !empty($request['image_alt'])? $request['image_alt']:'';
        $image->type = $type;
        $image->is_main = (isset($request['is_main']) && $request['is_main'] == 1)? 1:0;
        $image->description = '';
        $image->last_update = date('Y-m-d');

        $element->images()->save($image);

    }

}