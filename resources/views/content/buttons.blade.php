
<a  id="edit" href="{{ route('presentations.edit', ['presentation' => $id ]) }}">
    <button type="button" id="edit" name="edit" class="btn btn-primary btn-sm">Edit</button></a>
<form method="POST" action="{{ route('presentations.destroy', ['presentation' => $id ]) }}">
    @method('delete')
    @csrf
    <a id="delete"><button type="submit" id="delete" class="btn btn-primary btn-sm">Delete</button></a>
</form>
