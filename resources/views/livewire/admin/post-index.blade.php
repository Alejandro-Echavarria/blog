<div>
    <div class="card shadow-sm section-color">
        <div class="card-header color-primario">
            <div class="d-flex flex-row justify-content-around align-items-center">
                <div class="flex-grow-1 mr-1">
                    <input wire:model="search" type="text" class="form-control text-gray" placeholder="Buscar..." id="txtBuscar" name="txtBuscar">
                </div>
                <div class="form-inline">
                    <select class="form-control custom-select mx-1 text-gray" id="selectEntries">
                        <option value="10" class="text-gray">10</option>
                        <option value="25" class="text-gray">25</option>
                        <option value="50" class="text-gray">50</option>
                        <option value="100" class="text-gray">100</option>
                    </select>
                </div>
                <div>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> <span class="hidden-letters"> Agregar</span>
                    </a>
                </div>
            </div>
        </div>
        @if ($posts->count())    
            <div class="card-body table-responsive p-0">
                <table style="width: 100$" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 70%">Nombre</th>
                            <th style="width: 20%">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr class="px-2">
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-success mr-1" href="{{route('admin.posts.edit', $post)}}"><i class="fas fa-pen"></i></a>
                                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-3 border-top text-sm pt-3">
                <div class="float-left mt-2">
                    <p class="text-muted" id="numbers_numbers"></p>
                </div>
                <div class="float-right mt-2">
                    {{$posts->links()}}
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="text-center">
                    <strong class="text-gray">No existe ning&uacute;n registro...</strong>
                </div>
            </div>
        @endif
    </div>
</div>
