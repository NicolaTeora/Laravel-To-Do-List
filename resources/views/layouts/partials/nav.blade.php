<nav class="navbar bg-body-tertiary">

    <form class="container-fluid justify-content-start">
        <button class="btn btn-outline-primary me-2" type="button">
            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
        </button>
        <button class="btn btn-outline-secondary" type="button">
            <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>
        </button>
      </form>
</nav>