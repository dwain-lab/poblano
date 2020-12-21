<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>Menu</h2>
        <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">All</li>

                    @foreach ($menu_categories as $category)
                        <li data-filter=".filter-{{ $category['name'] }}">{{ Str::ucfirst($category['name']) }}</li>
                    @endforeach
                {{-- <li data-filter=".filter-starters">Starters</li>
                <li data-filter=".filter-salads">Salads</li>
                <li data-filter=".filter-specialties">Specialties</li> --}}
                </ul>
            </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($menus as $menu)
            <div class="col-lg-6 menu-item filter-{{ $menu->menu_category->name }}">
                <img src="{{ $menu->getFirstMediaUrl('menus-collection', 'thumb') }}" class="menu-img" alt="{{ $menu->dish }}">
                <div class="menu-content">
                <a href="#">{{ $menu->dish }}</a><span>${{ $menu->cost }}</span>
                </div>
                <div class="menu-ingredients">
                {{ $menu->ingredients }}
                </div>
            </div>
        @endforeach

        {{-- <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Bread Barrel</a><span>$6.95</span>
            </div>
            <div class="menu-ingredients">
            Lorem, deren, trataro, filede, nerada
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/cake.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Crab Cake</a><span>$7.95</span>
            </div>
            <div class="menu-ingredients">
            A delicate crab cake served on a toasted roll with lettuce and tartar sauce
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Caesar Selections</a><span>$8.95</span>
            </div>
            <div class="menu-ingredients">
            Lorem, deren, trataro, filede, nerada
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Tuscan Grilled</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
            Grilled chicken with provolone, artichoke hearts, and roasted red pesto
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Mozzarella Stick</a><span>$4.95</span>
            </div>
            <div class="menu-ingredients">
            Lorem, deren, trataro, filede, nerada
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Greek Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
            Fresh spinach, crisp romaine, tomatoes, and Greek olives
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Spinach Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
            Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
            </div>
        </div>

        <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
            <a href="#">Lobster Roll</a><span>$12.95</span>
            </div>
            <div class="menu-ingredients">
            Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div>
        </div> --}}

        </div>

    </div>
    </section><!-- End Menu Section -->

