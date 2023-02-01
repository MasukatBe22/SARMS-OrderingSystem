<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content" wire:poll.keep-alive>
            <span class="info-box-text">Total Sales</span>
            <span class="info-box-number">{{ $TotalSales }}</span>
            <a href="#total" type="button" class="small-box-footer">More info! <i class="fas fa-info-circle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content" wire:poll.keep-alive>
            <span class="info-box-text">Today Sales</span>
            <span class="info-box-number">{{ $TodaySales }}</span>
            <a href="#today" type="button" class="small-box-footer">More info! <i class="fas fa-info-circle"></i></a>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content" wire:poll.keep-alive>
            <span class="info-box-text">Yesterday Sales</span>
            <span class="info-box-number">{{ $YesterdaySales }}</span>
            <a href="#yesterday" type="button" class="small-box-footer">More info! <i class="fas fa-info-circle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content" wire:poll.keep-alive>
            <span class="info-box-text">Monthly Sales</span>
            <span class="info-box-number">{{ $MonthySales }}</span>
            <a href="#month" type="button" class="small-box-footer">More info! <i class="fas fa-info-circle"></i></a>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-shopping-cart"></i></span>
    
            <div class="info-box-content" wire:poll.keep-alive>
                <span class="info-box-text">Yearly Sales</span>
                <span class="info-box-number">{{ $YearSales }}</span>
                <a href="#year" type="button" class="small-box-footer">More info! <i class="fas fa-info-circle"></i></a>
            </div>
        </div>
    </div>
</div>