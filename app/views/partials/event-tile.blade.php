<div class="col-xs-12">
  @if ($event->isClosed)
      <div class="tile closed">
  @elseif ($event->isFinished)
      <div class="tile finished">
  @elseif ($event->cancelled)
      <div class="tile cancelled">
  @else
      <div class="tile">
  @endif

      <div class="tile-head">
          <a href="#" class="fold">
              <div class="col-xs-12 col-sm-6">
                  <h1><i class="fa fa-angle-double-up icon-spacing-right"></i>{{ $event->name }} @if($event->cancelled) <span class="no-line-through"> - Cancelled </span> @endif</h1>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <h1 class="date">{{ date('jS F Y', $event->start_time) }}</h1>
              </div>
          </a>
      </div>
      <div class="tile-body">
          <div class="tile-body-content">
              <div class="col-xs-12 col-sm-6">
                  <div class="col-xs-12 col-sm-6">
                      <p>Booking Closes</p>
                      <div class="field time">

                          <p>
                          @if ($event->isClosed || $event->isFinished)
                              Closed
                          @else
                              {{ date('d/m/Y', $event->close_time) }} <span>{{ date('H:i', $event->close_time) }}</span>
                          @endif
                          </p>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                      <p>Event Starts</p>

                      <div class="field time">
                          <p>
                              @if ($event->isFinished)
                              Finished
                              @else
                              {{ date('d/m/Y', $event->start_time) }} <span>{{ date('H:i', $event->start_time) }}</span>
                              @endif
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <div class="col-xs-12">
                      <a class="btn btn-simple btn-lg no-line-through" href="{{ route('event.show', ['slug' => $event->slug]) }}">View<i class="fa fa-arrow-right icon-spacing-left"></i></a>
                  </div>
                  <div class="col-xs-12">

                      <?php
                          $disable = "";
                          if ($event->isClosed || $event->isFinished || $event->cancelled)
                          {
                              $disable = "disabled";
                          }

                      ?>

                      <a class="btn btn-simple {{ $disable  }} btn-lg" href="{{ route('booking.create', ['slug' => $event->slug]) }}">Book<i class="fa fa-arrow-right icon-spacing-left"></i></a>

                      @if(Auth::check() && Auth::user()->is_admin)
                        <a class="btn btn-simple btn-lg no-line-through" href="{{ route('admin.event.edit', ['id' => $event->id]) }}">Edit<i class="fa fa-pencil icon-spacing-left"></i></a>
                        @if ($event->cancelled)
                            {{ Form::open(['route' => ['admin.event.delete', $event->id]]) }}
                                <button class="btn btn-simple btn-lg no-line-through" type="submit">Delete<i class="fa fa-remove icon-spacing-left"></i></button>
                            {{ Form::close() }}
                        @else
                            @if ($disable == 'disabled')
                                {{ Form::open(['route' => ['admin.event.cancel', $event->id]]) }}
                                    <button class="btn btn-simple {{ $disable }} btn-lg" type="submit">Cancel<i class="fa fa-remove icon-spacing-left"></i></button>
                                {{ Form::close() }}
                            @else
                                <button class="btn btn-simple {{ $disable }} btn-lg" type="submit">Cancel<i class="fa fa-remove icon-spacing-left"></i></button>
                            @endif
                        @endif
                      @endif

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
