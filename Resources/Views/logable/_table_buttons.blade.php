<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detail-activity-{{ $item->id }}">
  Show
</button>

<div class="modal text-left fade" id="modal-detail-activity-{{ $item->id }}" tabindex="-1" aria-labelledby="modal-detail-activity-{{ $item->id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="modal-detail-activity-{{ $item->id }}Label">Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <td colspan="2">
                <p class="card-title font-weight-bold my-2">User Account</p>
              </td>
            </tr>

            <tr>
              <td>Name</td>
              <td>{{ $item->user->name }}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ $item->user->email }}</td>
            </tr>

            <tr>
              <td>Event Type</td>
              <td>
                <span class="badge badge-{{ $item->colors[$item->type] ?? 'warning' }}">
                  {{ ucwords($item->type) }}
                </span>
              </td>
            </tr>

            <tr>
              <td>Model</td>
              <td>{{ ucwords($item->logable_type) }}</td>
            </tr>
            <tr>
              <td>Table ID</td>
              <td>{{ ucwords($item->logable_id) }}</td>
            </tr>
            <tr>
              <td colspan="2">
                <p class="card-title font-weight-bold my-2">New Data of Table</p>
              </td>
            </tr>

            @foreach ((Array) json_decode($item->new_data) as $field => $data)
                <tr>
                <td>{{ $field }}</td>
                  <td>{!! str_replace('"', '', json_encode($data)) !!}</td>
                </tr>
            @endforeach

            <tr>
              <td colspan="2">
                <p class="card-title font-weight-bold my-2">Old Data of Table</p>
              </td>
            </tr>

            @foreach ((Array) json_decode($item->old_data) as $field => $data)
                <tr>
                <td>{{ $field }}</td>
                  <td>{!! str_replace('"', '', json_encode($data)) !!}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>