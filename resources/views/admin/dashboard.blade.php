<x-app-layout>
    <x-slot name="header">
      <div class="col-12">
        <div class="col-6 text-right">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
          </h2>
        </div>
        <div class="col-6">
          <a class="text-right" href="{{ route('user.create') }}"><h2 class="btn btn-secondary">Create New User</h2></a>
        </div>
      </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <br>
                    <caption>List of users</caption>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $item)
                            <tr>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->email }}</td>
                              <td>
                                <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
