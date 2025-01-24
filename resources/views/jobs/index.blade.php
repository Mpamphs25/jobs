<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
        <x-card class="mb-4 text-sm">
            <form action={{route('jobs.index')}}  method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
              <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-input  type="text" name="search" value="" placeholder="Search for any text" />
              </div>
              <div>
                <div class="mb-1 font-semibold">Salary</div>
                <div class="flex space-x-2">
                  <x-input type="text" name="min_salary" value="" placeholder="From" />
                  <x-input type="text" name="max_salary" value="" placeholder="To" />
                </div>
              </div>
              <div>3</div>
              <div>4</div>
            </div>
            <div class="flex justify-center items-center">
              <button class="px-4 py-2 bg-black text-white hover:bg-white hover:text-black border border-black transition duration-300 cursor-pointer text-sm rounded">
                  Filter
              </button>
            </div>                           
        </form>
          </x-card>
    @foreach ($jobs as $job )
    <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', ['job'=>$job])">
                    Show
                </x-link-button>
            </div>
    </x-job-card>
    @endforeach
</x-layout>