<?php

namespace App\Http\Controllers;

use App\Models\MyMedia;
use App\Models\Property;
use App\Models\PropertyFile;
use App\Models\User;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\Media;
use Plank\Mediable\MediaUploader;
use Storage;
use Illuminate\Support\Facades\Response as Download;

class UploadController extends Controller
{
    use HandlesMediaUploadExceptions;

    private $mediaService;

    /**
     * Create a new service instance.
     *
     * @param MediaService $mediaService
     */
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function create(Request $request)
    {
        dd('I am here now');
    }

    public function show($file)
    {
        return Storage::disk('s3')->response($mediaBaseFolder . '/' . $file);
    }


    public function download($file)
    {
        $headers = [
            'Content-Type' => 'Content-Type: application/zip',
            'Content-Disposition' => 'attachment; filename="' . $file . '"',
        ];

        return Download::make(Storage::disk('s3')->get($mediaBaseFolder . '/' . $file), Response::HTTP_OK, $headers);
    }


    public function store(Request $request, MediaUploader $mediaUploader)
    {
        if ($request->hasFile('images')) {
            try {
                $user = $this->getAuthUser();
                $property = Property::find($request->property_id);
                if($property && $user){
                    $media = $mediaUploader->onDuplicateIncrement()->fromSource($request->file('images'))->beforeSave(function (Media $media) use ($user) {
                        $media->user_id = $this->getAuthUserId() ?? 0;
//                        $media->custom_properties = new \stdClass();
                    })->toDirectory('property')->upload();
                    $property->attachMedia($media, 'property');
                }

                $this->setApiSuccessMessage('Image Uploaded');
                return $this->getApiResponse();
            } catch (MediaUploadException $e) {
                throw $this->transformMediaUploadException($e);
            }
        } else {
            dd('Noe Imahge', $request->file('images'));
        }
    }
}
