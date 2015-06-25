@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Gallery</h1>
    <div class="gallery">
        <div class="gallery-folders">
            @if ($path != '')
                <div class="gallery-item-container">
                    <a data-name=".."
                        href="<?php
                            if (strpos($path, '/') > -1) {
                                $upPath = substr($path, 0, strrpos($path, '/'));
                            } else {
                                $upPath = '';
                            }
                            echo route('gallery.folder', $upPath) ?>"
                        class="noselect gallery-item gallery-folder"
                        data-id="up"
                        data-placement="bottom"
                        title="..">
                        <h4>
                            <span class="fa fa-folder fa-2x"></span>
                                <span class="name">..</span>
                        </h4>
                    </a>
                </div>
            @endif
            @foreach($folders as $folder)
                <div class="gallery-item-container">
                    <a data-name="{{ $folder->name }}"
                        href="{{ route('gallery.folder', $folder->path) }}"
                        class="noselect gallery-item gallery-folder"
                        data-id="{{ $folder->id }}"
                        title="{{ $folder->name }}">
                        <h4>
                            <span class="fa fa-folder fa-2x"></span>
                            @if (strlen($folder->name) > 24)
                                <span class="name">{{ substr($folder->name, 0 , 21) . '...' }}</span>
                            @else
                                <span class="name">{{ $folder->name }}</span>
                            @endif
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>

        <br>

        <div class="gallery-images">

            @foreach ($images as $image)
                <a href="#" data-target="#lightbox" data-toggle="modal" class="thumbnail thumbnail-box gallery-item noselect">
                    <img src="{{ route('image.inline', $image->upload_id) }}">
                    <div class="caption">
                        <h4>{{ $image->name }}</h4>
                        <p>{{ $image->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="light box" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>
@stop
