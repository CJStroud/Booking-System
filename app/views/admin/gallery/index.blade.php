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
        @foreach($folders as $folder)
            <div data-name="{{ $folder->name }}" 
                 class="noselect gallery-item gallery-folder" 
                 data-id="{{ $folder->id }}" 
                 data-toggle="tooltip" 
                 data-placement="bottom" 
                 title="{{ $folder->name }}">
                <h4>
                    <span class="fa fa-folder fa-2x"></span>
                    @if (strlen($folder->name) > 24)
                        <span class="name">{{ substr($folder->name, 0 , 21) . '...' }}</span>
                    @else
                        <span class="name"">{{ $folder->name }}</span>
                    @endif                    
                </h4>
            </div>
        @endforeach
    </div>
    
    <br>
    
    <div class="gallery-images">
        
        @foreach ($images as $image)
            <div data-name="{{ $image->name }}" class="media gallery-item gallery-image noselect">
                <div class="media-left">
                    <a href="#">
                        <div class="media-object" style="background-image: url('{{ route('image.inline', $image->upload_id) }}')"></div>
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading name">{{ $image->name }}</h4>
                    {{ $image->description }}
                </div>
            </div>
        @endforeach
    </div>
</div>


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

<div class="modal fade modal-upload-image" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="Upload Image" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['settings.account.delete'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
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


@stop

@section('javascript')
<script>
    $(function() {
       $(".gallery-admin .gallery-item").draggable({ 
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
            }
        });
        
        $(".gallery-admin .gallery-item img").on('dragstart', function(event) {
            event.preventDefault();
        });
        
        $(".gallery-admin .gallery-folder").droppable({
            tolerance: 'pointer',
            hoverClass: 'gallery-folder-hover',
            drop: function( event, ui ) {
                $(ui.draggable).fadeTo("0.5s", 0, function() {
                    $(this).remove();
                });
                $(ui.helper).remove();
            }
        });
    });

</script>

@stop