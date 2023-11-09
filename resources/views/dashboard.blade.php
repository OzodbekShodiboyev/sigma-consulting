<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <table class="table table-light table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ismi</th>
                <th scope="col">Telefon raqami</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
                <tr>
                  <th scope="row">{{$customer->id}}</th>
                  <td>{{$customer->name}}</td>
                  <td>+ {{$customer->phone}}</td>
                  <form action="{{ route('customers.updateStatus', $customer->id) }}" method="post">
                    @csrf
                    @method('put')
                    <td>
                        <select name="status" onchange="this.form.submit()">
                            <option value="Yangi" {{$customer->status == 'Yangi' ? 'selected' : ''}}>Yangi</option>
                            <option value="Bog'lanilgan" {{$customer->status == 'Bog\'lanilgan' ? 'selected' : ''}}>Bog'lanilgan</option>
                            <option value="Bog'lanilmagan" {{$customer->status == 'Bog\'lanilmagan' ? 'selected' : ''}}>Bog'lanilmagan</option>
                        </select>
                    </td>
                </form>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
  </div>
</x-app-layout>
