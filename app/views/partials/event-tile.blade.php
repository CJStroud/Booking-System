<div class="col-xs-12">

    @if ($event->isClosed)
        <div class="tile closed">
    @elseif ($event->isFinished)
        <div class="tile finished">
    @else
        <div class="tile">
    @endif

        <div class="tile-head">
            <a href="#" class="fold">
                <div class="col-xs-12 col-sm-6">
                    <h1><i class="fa fa-angle-double-up fa-spacing-right"></i>{{ $event->name }}</h1>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h1 class="date">{{ date('dS F Y', $event->start_time) }}</h1>
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
                        <a class="btn btn-simple btn-lg" href="{{ route('event.show', ['slug' => $event->slug]) }}">View<i class="fa fa-arrow-right fa-spacing-left"></i></a>
                    </div>
                    <div class="col-xs-12">

                        <?php
                            $disable = "";
                            if ($event->isClosed || $event->isFinished)
                            {
                                $disable = "disabled";
                            }
                        ?>

                        <a class="btn btn-simple {{ $disable  }} btn-lg" href="{{ route('booking.create', ['slug' => $event->slug]) }}">Book<i class="fa fa-arrow-right fa-spacing-left"></i></a>

                        @if(Auth::check() && Auth::user()->is_admin)
                        <a class="btn btn-simple {{ $disable  }} btn-lg" href="{{ route('event.show', ['slug' => $event->slug]) }}">Edit<i class="fa fa-pencil fa-spacing-left"></i></a>
                        <a class="btn btn-simple {{ $disable  }} btn-lg" href="{{ route('event.show', ['slug' => $event->slug]) }}">Cancel<i class="fa fa-remove fa-spacing-left"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
