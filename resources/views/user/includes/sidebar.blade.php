       <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
       <div class="main-menu-content">
              <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              <li class="nav-item active"><a href="{{route('index')}}"><i class="la la-mouse-pointer"></i><span
                            class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
              </li>



              <li class="nav-item"><a href=""><i class="la la-group"></i>
                     <span class="menu-title" data-i18n="nav.dash.main"> {{__('admin/sidebar.friends')}} </span>
                     <span
                            class="badge badge badge-danger badge-pill float-right mr-2">80</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('AllFriends')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidebar.show_all')}} </a>
                     </li>
                     <li><a class="menu-item" href="{{route('AddFriends')}}" data-i18n="nav.dash.crypto">
                             {{__('admin/sidebar.Add_friend')}}   </a>
                     </li>
                     </ul>
              </li>

              <li class="nav-item"><a href=""><i class="la la-group"></i>
                     <span class="menu-title" data-i18n="nav.dash.main"> {{__('admin/sidebar.users')}} </span>
                     <span
                            class="badge badge badge-danger badge-pill float-right mr-2">200</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('showUsers')}}"
                                          data-i18n="nav.dash.ecommerce"> {{__('admin/sidebar.show_all')}} </a>
                     </li>
                     <li><a class="menu-item" href="{{route('addUsers')}}" data-i18n="nav.dash.crypto"> {{__('admin/sidebar.Add_user')}} </a>
                     </li>
                     </ul>
              </li>


                  <li class="nav-item"><a href=""><i class="la la-group"></i>
                     <span class="menu-title" data-i18n="nav.dash.main"> {{__('admin/sidebar.groups')}} </span>
                     <span
                            class="badge badge badge-danger badge-pill float-right mr-2">200</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('showGroup')}}"
                                          data-i18n="nav.dash.ecommerce">   {{__('admin/sidebar.show_all_group')}}</a>
                     </li>
                     <li><a class="menu-item" href="{{route('createGroup')}}" data-i18n="nav.dash.crypto"> {{__('admin/sidebar.Add_group')}} </a>
                     </li>
                     </ul>
              </li>


              </ul>
       </div>
       </div>
