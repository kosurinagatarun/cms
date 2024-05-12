<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Include any additional styles -->
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/oar18yrabgr1ca4cfieet5ferz7mdkwhshebzhqixjn1ztio/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

</head>

<body class="bg-gray-100">

    <!-- Admin Dashboard Layout -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="md:w-64 xl:w-80 bg-gray-800">
            <div class="h-full flex flex-col">
                <!-- Sidebar Header -->
                <div class="h-16 flex items-center justify-center md:justify-start px-6 bg-gray-900">
                    {{-- <h1 class="text-lg font-medium text-white">Admin Panel</h1> --}}
                    <img src="{{ asset('storage\white_logo1.png') }}" alt="Logo">
                    <button id="sidebarToggle"
                        class="lg:hidden ml-auto focus:outline-none text-white hover:text-gray-300">
                        <!-- Hamburger Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                    </button>
                </div>
                <!-- Sidebar Content -->
                {{-- <nav class="flex-1 px-2 py-4 md:px-6 md:py-4 bg-gray-800">

                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <span>Dashboard</span>
                            </a>
                            <a href="{{ route('admin.services.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <span>Services</span>
                            </a>
                            <a href="{{ route('admin.pages.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <span>Pages</span>
                            </a>

                            <a href="{{ route('admin.project-categories.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <span>Project Categories</span>
                            </a>
                        </li>


                    </ul>


                </nav> --}}
                <br>
                <div id="Main"
                    class="xl:rounded-r transform xl:translate-x-0 ease-in-out transition duration-500 flex justify-start items-start h-full w-full sm:w-64 bg-gray-000 flex-col">

                    <!-- Blog Section -->
                    <div class="flex flex-col  items-start px-6 w-full">
                        <button onclick="showMenu('')"
                            class="focus:outline-none text-left text-white flex justify-between items-center w-full py-2 space-x-3 rounded-md hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                            <a href="{{ route('admin.dashboard') }}">
                                <p class="text-sm leading-5 ">&#160 &#160<i class="fas fa-chess-board"></i>&#160
                                    &#160DashBoard </p>
                            </a>

                        </button>
                    </div>

                    <!-- Project Section -->
                    <div class="flex flex-col items-start px-6 w-full">
                        <button onclick="showMenu('projects')"
                            class="focus:outline-none text-left text-white flex justify-between items-center w-full py-2 space-x-3 rounded-md hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                            <p class="text-sm leading-5  pl-2"><i class="fas fa-tasks"></i>&#160 &#160 Projects</p>
                            <svg class="w-5 h-5 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6.293 7.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414zM10 4a1 1 0 110 2 1 1 0 010-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="menu-projects" class="hidden flex flex-col w-full md:w-auto items-start pl-6">
                            <!-- Sub-menu items -->
                            <a href="{{ route('admin.services.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>View All Projects</span>
                            </a>
                            <a href="{{ route('admin.services.create') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient-to-r from-yellow-700 to-yellow-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>Create Project</span>
                            </a>
                        </div>
                    </div>

                    <!-- Project Section -->
                    <div class="flex flex-col items-start px-6 w-full">
                        <button onclick="showMenu('projects-category')"
                            class="focus:outline-none text-left text-white flex justify-between items-center w-full py-2 space-x-3 rounded-md hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                            <p class="text-sm leading-5  pl-2"><i class="fas fa-tasks"></i>&#160 &#160 Project
                                Categories</p>
                            <svg class="w-5 h-5 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6.293 7.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414zM10 4a1 1 0 110 2 1 1 0 010-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="menu-projects-category" class="hidden flex flex-col w-full md:w-auto items-start pl-6">
                            <!-- Sub-menu items -->
                            <a href="{{ route('admin.project-categories.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>View All Project Categories</span>
                            </a>
                            <a href="{{ route('admin.project-categories.create') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient-to-r from-yellow-700 to-yellow-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>Create Project Category</span>
                            </a>
                        </div>
                    </div>

                    <!-- Pages Section -->
                    <div class="flex flex-col items-start px-6 w-full">
                        <button onclick="showMenu('pages')"
                            class="focus:outline-none text-left text-white flex justify-between items-center w-full py-2 space-x-3 rounded-md hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                            <p class="text-sm leading-5  pl-2"><i class="fas fa-pager"></i>&#160 &#160 Pages</p>
                            <svg class="w-5 h-5 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6.293 7.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414zM10 4a1 1 0 110 2 1 1 0 010-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="menu-pages" class="hidden flex flex-col w-full md:w-auto items-start pl-6">
                            <!-- Sub-menu items -->
                            <a href="{{ route('admin.pages.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>View All Pages</span>
                            </a>
                            <a href="{{ route('admin.pages.create') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient-to-r from-yellow-700 to-yellow-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>Create Page</span>
                            </a>
                        </div>
                    </div>

                    <!-- Members Section -->
                    <div class="flex flex-col items-start px-6 w-full">
                        <button onclick="showMenu('members')"
                            class="focus:outline-none text-left text-white flex justify-between items-center w-full py-2 space-x-3 rounded-md hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                            <p class="text-sm leading-5  pl-2"><i class="fas fa-users-cog"></i>&#160 &#160 Members</p>
                            <svg class="w-5 h-5 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6.293 7.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414zM10 4a1 1 0 110 2 1 1 0 010-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="menu-members" class="hidden flex flex-col w-full md:w-auto items-start pl-6">
                            <!-- Sub-menu items -->
                            <a href="{{ route('admin.members.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>View All Members</span>
                            </a>
                            <a href="{{ route('admin.members.create') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient-to-r from-yellow-700 to-yellow-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>Create Member</span>
                            </a>
                        </div>
                    </div>


                    <!-- Blogs Section -->
                    <div class="flex flex-col items-start px-6 w-full">
                        <button onclick="showMenu('blog')"
                            class="focus:outline-none text-left text-white flex justify-between items-center w-full py-2 space-x-3 rounded-md hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                            <p class="text-sm leading-5  pl-2"><i class="fab fa-blogger-b"></i>&#160 &#160 Blogs</p>
                            <svg class="w-5 h-5 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6.293 7.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414zM10 4a1 1 0 110 2 1 1 0 010-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="menu-blog" class="hidden flex flex-col w-full md:w-auto items-start pl-6">
                            <!-- Sub-menu items -->
                            <a href="{{ route('admin.blog_posts.index') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>View All Blogs</span>
                            </a>
                            <a href="{{ route('admin.blog_posts.create') }}"
                                class="flex items-center p-2 space-x-3 rounded-md text-gray-300 hover:bg-gradient-to-r from-yellow-700 to-yellow-500 hover:text-white">
                                <svg class="w-1 h-1 fill-current text-yellow-gradient-to-r from-yellow-700 to-yellow-500"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="10" cy="10" r="10" />
                                </svg>
                                <span>Create Blog Post</span>
                            </a>
                        </div>
                    </div>



                </div>


            </div>
        </aside>


        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white border-b-4 border-gray-900">
                <div class="flex justify-between items-center py-4 px-6 lg:px-10">
                    <!-- Hamburger Button for Mobile -->
                    <button id="sidebarCollapse" class="text-gray-500 focus:outline-none lg:hidden">
                        <!-- SVG for Hamburger icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12h18M3 6h18M3 18h18"></path>
                        </svg>
                    </button>
                    <!-- Search Input -->
                    <div class="relative ml-4 lg:ml-0">
                        <!-- SVG for search icon -->
                        <input class="form-input w-full pl-10 pr-4 rounded-full" type="text" placeholder="Search">
                    </div>
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-x-auto overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-4 py-6 lg:px-10">
                    <!-- Your content goes here -->
                    @yield('content')
                </div>
            </main>
            <!-- Footer -->
            <footer class="bg-gray-900 text-white text-center p-4">
                <p>© 2024 DigiKongs. All rights reserved.</p>
            </footer>
        </div>



    </div>

    <!-- Include Tailwind CSS and JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebarToggle').click();
        });
    </script>

    <script>
        function showMenu(menu) {
            let menuElement = document.getElementById('menu-' + menu);
            let iconElement = document.getElementById('icon-' + menu);

            menuElement.classList.toggle('hidden');
            iconElement.classList.toggle('rotate-180');
        }
    </script>
</body>

</html>
