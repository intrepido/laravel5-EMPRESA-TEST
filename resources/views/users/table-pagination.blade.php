<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Empleado</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->employee)
                        <h4><span id='yes' class="label label-success">Yes</span></h4>
                    @else
                        <h4><span id='no' class="label label-default">No</span></h4>
                    @endif
                </td>
                <td>{{$user->created_at}}</td>
                <td>
                    <div class="btn-toolbar" role="toolbar">
                        <a href="#" id="{{$user->id}}" class="btn btn-primary edit-user">Edit</a>
                        <a href="#" id="{{$user->id}}" class="btn btn-danger open-modal-delete">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="text-center">{!! $users->render() !!}</div>
