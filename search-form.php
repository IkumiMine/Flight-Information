<div class="card p-2 shadow-sm mb-3 bg-main-content" id="form">
    <form action="" method="get">
        <div class="row">
            <div class="col-lg-6">
                <label for="flight-number" class="form-label">Flight Number *</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="flightNum" placeholder="e.g. AC7605">
                    <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-plane fa-fw"></i>
                                        </span>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="flight-number" class="form-label">Flight Date</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="flightDate" placeholder="Flight Date">
                </div>
            </div>
        </div>
        <span class="w-100"><?= isset($error) ? $error : "" ?></span>
        <div class="row mt-2">
            <div  class="col-lg-6">
                <input type="submit" class="btn btn-dark w-100" value="Search" name="search" id="searchBtn">
            </div>
            <div class="col-lg-6">
                <a class="btn btn-warning w-100" href="destroy.php" id="refreshBtn">Refresh</a>
            </div>
        </div>
    </form>
</div>
