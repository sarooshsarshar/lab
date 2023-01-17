<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                {{-- <li>
                    <a href="{{route('dashboard')}}">
                        <i class="iconsminds-shop-4"></i> Dashboard
                    </a>
                </li> --}}
                <li>
                    <a href="{{route('booking.list')}}">
                        <i class="iconsminds-check"></i> Patient Booking
                    </a>
                </li>
                <li>
                    <a href="{{route('booking.approved')}}">
                        <i class="iconsminds-check"></i> Approved Booking
                    </a>
                </li>
                <li>
                    <a href="{{route('unit.index')}}">
                        <i class="iconsminds-check"></i> Unit
                    </a>
                </li>
                <li>
                    <a href="{{route('group.index')}}">
                        <i class="simple-icon-grid"></i> Group
                    </a>
                </li>
                <li>
                    <a href="{{route('test.index')}}">
                        <i class="iconsminds-test-tube"></i> Test
                    </a>
                </li>
                <li>
                    <a href="{{route('testreport.add')}}">
                        <i class="iconsminds-folder-add--"></i> Add Test Report
                    </a>
                </li>
                <li>
                    <a href="{{route('testreport.index')}}">
                        <i class="iconsminds-folder-add--"></i> All Test Report
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <!-- User -->
            
            <!-- Inventory -->
            {{-- <ul class="list-unstyled" data-link="inventory">

                <li>
                    <a href="{{route('inventoryitem.index')}}">
                        <i class="simple-icon-rocket"></i> <span class="d-inline-block">Item List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('inventoryitem.create')}}">
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">Transfer</span>
                    </a>
                </li>
            </ul> --}}
            
        </div>
    </div>
</div>