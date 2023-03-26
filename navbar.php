<nav class="navbar shadow-sm navbar-expand-lg py-3 py-lg-0 px-lg-5">
    <a href="home.php" class="navbar-brand ml-lg-3">
        <h1 class="m-0 display-5 text-dark"><span class="text-primary">Peachy</span>Bbies</h1>
    </a>
    <div class="container-fluid justify-content-end">
        <div class="row mr-0">
            <div class="col-12">
                <a href="dashboard.php" class="btn btn-outline-primary d-none d-lg-block">Dashboard</a>
            </div>
        </div>
        <div class="row mr-0">
            <div class="col-12">
                <a href="multiplier.php" class="btn btn-outline-primary d-none d-lg-block">Multiplier Report</a>
            </div>
        </div>
        <div class="row mr-0">
            <div class="col-12">
                <a href="records.php" class="btn btn-outline-primary d-none d-lg-block">All Records</a>
            </div>
        </div>
        <div class="row mr-0">
            <div class="col-12">
                <a href="reportCreator.php" class="btn btn-outline-primary d-none d-lg-block">Report Creator</a>
            </div>
        </div>
        <div class="btn-group mr-3">
            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add Feature
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="addSlime.php">Add Slime</a>
                <a class="dropdown-item" href="addUser.php">Add User</a>
                <a class="dropdown-item" href="addBreak.php">Add Breaks</a>
            </div>
        </div>
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Display Averages
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="averages/sku.php">SKU by hour</a>
                <a class="dropdown-item" href="averages/texture.php">Texture by hour</a>
                <a class="dropdown-item" href="averages/breakTime.php">Break Time</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="logout.php" class="btn btn-outline-danger d-none d-lg-block">Logout</a>
            </div>
        </div>
    </div>
</nav>