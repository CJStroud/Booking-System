@extends('layouts.admin-settings')

@section('settings-content')
<div class="col-xs-12">
    <h1 class="col-xs-12 col-sm-4 col-md-3">Gallery</h1>
    <div class="col-xs-12 col-sm-4 col-md-2 pull-right">
        <button type="submit"
                class="btn btn-default btn-with-addon"
                data-toggle="modal"
                data-target="#newFolder">
            <span class="btn-text">New Folder</span>
            <span class="btn-addon btn-addon-primary">
                <i class="fa fa-folder"></i>
            </span>
        </button>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-2 pull-right">
        <button type="submit"
                class="btn btn-default btn-with-addon"
                data-toggle="modal"
                data-target="#uploadImage">
            <span class="btn-text">Upload</span>
            <span class="btn-addon btn-addon-primary">
                <i class="fa fa-upload"></i>
            </span>
        </button>
    </div>
</div>

<div class="gallery-admin">

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
                        echo route('admin.gallery.folder', $upPath) ?>"
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
                    href="{{ route('admin.gallery.folder', $folder->path) }}"
                    class="noselect gallery-item gallery-folder gallery-draggable"
                    data-id="{{ $folder->id }}"
                    data-toggle="tooltip"
                    data-placement="bottom"
                    data-type="folder"
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
            <div class="gallery-item-container">
                <a href="#" class="gallery-item gallery-image noselect gallery-draggable" data-name="{{ $image->name }}" data-id="{{ $image->id }}" data-type="image">
                    <div class="media">
                        <div class="media-left">
                                <div class="media-object" style="background-image: url('{{ route('image.inline', $image->upload_id) }}')"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading name">{{ $image->name }}</h4>
                            {{ $image->description }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div id="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" data-action="edit"><span class="fa fa-pencil icon-spacing-right"></span>Edit</a></li>
            <li><a href="#" data-action="delete"><span class="fa fa-trash icon-spacing-right"></span>Delete</a></li>
        </ul>
    </div>
</div>

{{-- New Folder Modal --}}
<div class="modal fade modal-new-folder" id="newFolder" tabindex="-1" role="dialog" aria-labelledby="New Folder" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['admin.gallery.new-folder'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">New Folder</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Folder name</label>
                <input type="text" class="form-control" placeholder="Enter folder name" name="name">
            </div>
            {{ Form::hidden('path', $path) }}
        </div>
        <div class="modal-footer">
          <div class="col-xs-6 col-sm-3 col-sm-offset-6">
              <button type="submit" class="btn btn-secondary">Create</button>
          </div>
          <div class="col-xs-6 col-sm-3">
            <button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal">
                <span class="btn-text">Close</span>
                <span class="btn-addon btn-addon-primary">
                    <i class="fa fa-close"></i>
                </span>
            </button>
          </div>
        </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- New Image Modal --}}
<div class="modal fade modal-upload-image" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="Upload Image" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['admin.gallery.upload'], 'role' => 'form', 'id' => 'form', 'method' => 'POST', 'files' => true ] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Image</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Image name</label>
                <input type="text" class="form-control" id="imageName" placeholder="Enter image name" name="name">
            </div>

            <div class="form-group">
                <label for="description">Image description</label>
                <textarea class="form-control" placeholder="Enter image description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="image-upload">Image upload</label>
                <input type="file" name="image-upload">
            </div>
            {{ Form::hidden('path', $path) }}

        </div>
        <div class="modal-footer">
          <div class="col-xs-6 col-sm-3 col-sm-offset-6">
              <button type="submit" class="btn btn-secondary">Upload</button>
          </div>
          <div class="col-xs-6 col-sm-3">
            <button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal">
                <span class="btn-text">Close</span>
                <span class="btn-addon btn-addon-primary">
                    <i class="fa fa-close"></i>
                </span>
            </button>
          </div>
        </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- Edit Folder Modal --}}
<div class="modal fade modal-edit-folder" id="editFolder" tabindex="-1" role="dialog" aria-labelledby="Edit Folder" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['admin.gallery.folder.edit'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Folder</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Folder name</label>
                <input type="text" class="form-control" placeholder="Enter folder name" name="name">
            </div>
            {{ Form::hidden('folder-id', null) }}
        </div>
        <div class="modal-footer">
          <div class="col-xs-6 col-sm-3 col-sm-offset-6">
              <button type="submit" class="btn btn-secondary">Edit</button>
          </div>
          <div class="col-xs-6 col-sm-3">
            <button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal">
                <span class="btn-text">Close</span>
                <span class="btn-addon btn-addon-primary">
                    <i class="fa fa-close"></i>
                </span>
            </button>
          </div>
        </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

{{-- Edit Image Modal --}}
<div class="modal fade modal-edit-image" id="editImage" tabindex="-1" role="dialog" aria-labelledby="Edit Image" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['admin.gallery.image.edit'], 'role' => 'form', 'id' => 'form', 'method' => 'POST'] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Image</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Image name</label>
                <input type="text" class="form-control" id="imageName" placeholder="Enter image name" name="name">
            </div>

            <div class="form-group">
                <label for="description">Image description</label>
                <textarea class="form-control" placeholder="Enter image description" name="description"></textarea>
            </div>
            {{ Form::hidden('image-id', null) }}
        </div>
        <div class="modal-footer">
          <div class="col-xs-6 col-sm-3 col-sm-offset-6">
              <button type="submit" class="btn btn-secondary">Edit</button>
          </div>
          <div class="col-xs-6 col-sm-3">
            <button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal">
                <span class="btn-text">Close</span>
                <span class="btn-addon btn-addon-primary">
                    <i class="fa fa-close"></i>
                </span>
            </button>
          </div>
        </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop

@section('javascript')
<script>
    $(function() {
       $(".gallery-admin .gallery-draggable").draggable({
            scroll: true,
            scrollSensitivity: 10,
            scrollSpeed: 10,
            stack: ".gallery-admin .gallery-item",
            revert: true,
            helper: function() {
                return $('<div class="gallery-helper"></div>').append($('<span>' + $(this).data('name')  + '</span>').clone());
            },
            cursor: "default",
            cursorAt: { top: -15, left: -5 },
            start: function(event, ui) {
                $(this).fadeTo("0.3s", 0.5);
                $(ui.helper).zIndex(99);
            },
            stop: function(event, ui) {
                $(this).fadeTo("fast", 1);
                $(ui.helper).fadeTo("fast", 0);
            },
            distance: 30
        });

        $(".gallery-admin .gallery-item img").on('dragstart', function(event) {
            event.preventDefault();
        });

        $(".gallery-admin .gallery-folder").droppable({
            tolerance: 'pointer',
            hoverClass: 'gallery-folder-hover',
            drop: function( event, ui ) {
                $(ui.helper).remove();

                var url = '';
                var data = {};
                var id = $(ui.draggable).data('id');
                var newLocation = event.target.href;

                if ($(ui.draggable).hasClass('gallery-image')) {
                    url = "{{ route('admin.gallery.move-image.ajax') }}";
                    data = {
                        newLocation: newLocation,
                        imageId: id
                    };
                } else {
                    url = "{{ route('admin.gallery.move-folder.ajax') }}";
                    data = {
                        newLocation: newLocation,
                        folderId: id
                    }
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(result) {
                        $(ui.draggable).fadeTo("0.5s", 0, function() {
                            $(this).remove();
                        });
                    }
                });

            }
        });

        $('.gallery-item').contextmenu({
            target: '#context-menu',
            before: function(e, context) {
                if ($(context).data('id') == 'up') {
                    e.preventDefault();
                    return false;
                }
            },
            onItem: function(context, e) {
                var action = $(e.target).data('action');
                e.preventDefault();
                switch (action) {
                    case 'delete':
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('admin.gallery.delete.ajax') }}",
                            data: {
                                id: $(context).data('id'),
                                type: $(context).data('type')
                            },
                            success: function(result) {
                                $(context).fadeTo("0.5s", 0, function() {
                                    $(this).detach();
                                    location.reload();
                                });
                            }
                        });
                        break;
                    case 'edit':
                        if ($(context).data('type') == 'image') {
                            $('#editImage [name="name"]').val($(context).find('.name').text().trim());
                            $('#editImage [name="description"]').val($(context).find('.media-body').clone().children().remove().end().text().trim());
                            $('#editImage [name="image-id"]').val($(context).data('id'));
                            $('#editImage').modal('show');
                        } else {
                            $('#editFolder [name="name"]').val($(context).text().trim());
                            $('#editFolder [name="folder-id"]').val($(context).data('id'));
                            $('#editFolder').modal('show');
                        }
                        break;
                }

                return true;
            }
        });
    });

</script>
@stop
