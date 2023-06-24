 <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
                 <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                     <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                         <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                             <tr>
                                 <th scope="col" class="px-6 py-3">
                                     No
                                 </th>
                                 <th scope="col" class="px-6 py-3">
                                     Name
                                 </th>
                                 <th scope="col" class="px-6 py-3">
                                     Job Title
                                 </th>
                                 <th scope="col" class="px-6 py-3">
                                     Department
                                 </th>
                                 <th scope="col" class="px-6 py-3">
                                     Age
                                 </th>
                                 <th scope="col" class="px-6 py-3">
                                     Salary
                                 </th>

                             </tr>
                         </thead>
                         <tbody>
                             @php
                                 $count = 0;
                             @endphp
                             @foreach ($employees as $employee)
                                 <tr
                                     class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                     <td class="px-6 py-4">
                                         {{ ++$count }}
                                     </td>
                                     <th scope="row"
                                         class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                         {{ $employee->fullname }}
                                     </th>
                                     <td class="px-6 py-4">
                                         {{ $employee->title }}
                                     </td>
                                     <td class="px-6 py-4">
                                         {{ $employee->department }}
                                     </td>
                                     <td class="px-6 py-4">
                                         {{ $employee->age }}
                                     </td>
                                     <td class="px-6 py-4">
                                         ${{ number_format($employee->salary, 2, ',', '.') }}
                                     </td>
                                 </tr>
                             @endforeach

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
