<x-App>
    <p class="alert-danger mt-4 font-weight-bold">If you press the button your user will be permanently deleted!</p>
    <form method="POST" action="{{ route('profiles.destroy', current_user()) }}">
        @csrf
        @method('delete')

        <div class="mt-6">
            <button class="btn-danger text-white rounded py-2 px-4 ml-24" type="submit">
                DELETE USER PERMANENTLY
            </button>
        </div>
    </form>
</x-App>
