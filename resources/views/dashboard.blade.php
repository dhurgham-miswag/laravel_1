<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="p-4 bg-gray-800 mt-6">
                <nav class="border-2 border-gray-700 p-4 rounded-lg">
                    <h2 class="text-3xl text-white font-bold mb-6 text-center">Dashboard Overview</h2>
                    
                    <ul class="fi-wi-stats-overview grid gap-4 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                        <li>
                            <a href="/products_dashboard" class="fi-wi-stats-overview-stat relative rounded-xl bg-gray-900 p-10 sm:p-8 md:p-12 shadow-sm ring-1 ring-gray-700 block text-center text-2xl sm:text-3xl font-semibold text-white border border-gray-700 hover:border-gray-400">
                                Total Products: {{ $totalProducts }}<br>
                                <span class="block mt-4 text-lg sm:text-xl">View All Products ⏳</span>
                            </a>
                        </li>
                        <li>
                            <a href="/categories_dashboard" class="fi-wi-stats-overview-stat relative rounded-xl bg-gray-900 p-10 sm:p-8 md:p-12 shadow-sm ring-1 ring-gray-700 block text-center text-2xl sm:text-3xl font-semibold text-white border border-gray-700 hover:border-gray-400">
                                Total Categories: {{ $totalCategories }}<br>
                                <span class="block mt-4 text-lg sm:text-xl">View All Categories ⏳</span>
                            </a>
                        </li>
                        <li>
                            <a href="/orders_dashboard" class="fi-wi-stats-overview-stat relative rounded-xl bg-gray-900 p-10 sm:p-8 md:p-12 shadow-sm ring-1 ring-gray-700 block text-center text-2xl sm:text-3xl font-semibold text-white border border-gray-700 hover:border-gray-400">
                                Total Orders: {{ $totalOrders }}<br>
                                <span class="block mt-4 text-lg sm:text-xl">View All Orders ⏳</span>
                            </a>
                        </li>
                        <li>
                            <a  class="fi-wi-stats-overview-stat relative rounded-xl bg-gray-900 p-10 sm:p-8 md:p-12 shadow-sm ring-1 ring-gray-700 block text-center text-2xl sm:text-3xl font-semibold text-white border border-gray-700 hover:border-gray-400">
                                Total Products in Orders: {{ $totalOrderProducts }}<br>
                                <span class="block mt-4 text-lg sm:text-xl"></span>
                            </a>
                        </li>
                        <li>
                            <a href="/customers_dashboard" class="fi-wi-stats-overview-stat relative rounded-xl bg-gray-900 p-10 sm:p-8 md:p-12 shadow-sm ring-1 ring-gray-700 block text-center text-2xl sm:text-3xl font-semibold text-white border border-gray-700 hover:border-gray-400">
                                Total Customers: {{ $totalCustomers }}<br>
                                <span class="block mt-4 text-lg sm:text-xl">View All Customers ⏳</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-app-layout>
