  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fab fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

                    <div class="position-sticky">
                      <div class="list-group list-group-flush mx-3 mt-4">
                        <a href="{{ route('home') }}" class="list-group-item list-group-item-action py-2 ripple {{ (request()->is('home')) ? 'active' : '' }} {{ (request()->is('/')) ? 'active' : '' }}" ria-current="true">
                          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Home</span>
                        </a>
                        <a href="{{ route('certificado') }}" class="list-group-item list-group-item-action py-2 ripple {{ (request()->is('certificado*')) ? 'active' : '' }}">
                          <i class="fas fa-file fa-fw me-3"></i><span>  Download 3.1 Certificates</span>
                        </a>
                        <a href="{{ route('item') }}" class="list-group-item list-group-item-action py-2 ripple  {{ (request()->is('item*')) ? 'active' : '' }}"
                          ><i class="fa fa-product-hunt fa-fw me-3"></i><span>  Stock Availability</span></a
                        >

                        <a href="{{route('deliverynote')}}" class="list-group-item list-group-item-action py-2 ripple {{ (request()->is('delivery*')) ? 'active' : '' }}"
                          ><i class="fas fa-truck fa-fw me-3"></i><span> Delivery Notes</span></a
                        >
                        @if (auth()->check())
                               @if(Auth::user()->isinrule(['supermaster']))
                                  <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-file fa-fw me-3"></i><span>  Invoices</span></a>
                                  <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-bar fa-fw me-3"></i><span>  Orders</span></a>
                                  <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-file fa-fw me-3"></i><span>  Quotations</span></a >
                                  <a href="{{ route('user') }}" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-user fa-fw me-3">  </i><span>  Users</span></a>
                                  <a href="{{ route('role') }}" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-wrench fa-fw me-3">  </i><span>  Roles</span></a>
                              @endif
                       @endif
                                          

                      </div>
                    </div>
    </section>
  </aside>


