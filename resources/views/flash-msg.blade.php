<style>
    .alert {
        display: none; /* Hide alert by default */
    }
</style>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
        <h4 class="alert-heading">Success!</h4>
        <p>{{ Session::get('success') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        // Show success alert
        document.getElementById('successAlert').style.display = 'block';

        // Auto-hide success alert after 5 seconds
        setTimeout(function () {
            document.getElementById('successAlert').style.display = 'none';
        }, 5000);
    </script>
@endif

@if (Session::has('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
        <h4 class="alert-heading">Error!</h4>
        <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        // Show error alert
        document.getElementById('errorAlert').style.display = 'block';

        // Auto-hide error alert after 5 seconds
        setTimeout(function () {
            document.getElementById('errorAlert').style.display = 'none';
        }, 5000);
    </script>
@endif
