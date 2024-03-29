@props(['message', 'type'])

<div class="alert {{$type}} alert-dismissible fade show" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>            
</div>