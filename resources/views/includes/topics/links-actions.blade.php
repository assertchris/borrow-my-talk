@link(route('topics.edit', $topic), svg('edit') . ' edit', [
    'action'    
])
<form id="delete-{{ $topic->id }}" action="{{ route('topics.destroy', [$topic])}}" method="POST" style="display: inline">
    @method('DELETE')
    @csrf
    @link('#', svg('delete') . ' delete', [
        'action ml-4'
    ], 'onclick="event.preventDefault(); confirm(\'Are you sure?\') && document.getElementById(\'delete-' . $topic->id . '\').submit(); "')
</form>
