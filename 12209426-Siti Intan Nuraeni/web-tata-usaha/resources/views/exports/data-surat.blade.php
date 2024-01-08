<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nomor Surat</th>
        <th scope="col">Perihal</th>
        <th scope="col">Tanggal Keluar</th>
        <th scope="col">Penerima Surat</th>
        <th scope="col">Notulis</th>
        <th scope="col">Hasil Rapat</th>
        <th scope="col" width="100px"></th>
    </tr>
    </thead>
    <tbody>
    @php($number = 1)
    @foreach ($letters as $value)
        <tr>
            <td class="align-middle">{{ $number++ }}</td>
            <td class="align-middle">{{ $value->letterTypes->letter_code }}/003/SMK Wikrama/XII/2023</td>
            <td class="align-middle">{{ $value->letter_perihal }}</td>
            <td class="align-middle">{{ $value->created_at->format('d F Y') }}</td>
            <td class="align-middle">
                <ol class="align-middle mb-0 ps-3">
                    @php($numberRecipient = 1)
                    @foreach (json_decode($value->recipients) as $recipient)
                        <li>{{$numberRecipient++}}.{{ $recipient }}</li>
                    @endforeach
                </ol>
            </td>
            <td class="align-middle">{{ $value->user->name }}</td>

            <td class="align-middle">
                @if ($value->result)
                    <p class="text-success align-middle mb-0">Sudah dibuat</p>
                @else
                    <p class="text-danger align-middle mb-0">Belum dibuat</p>
                @endif
            </td>

            <td class="align-middle">
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{ route('data-surat.detail', $value->id) }}" class="btn btn-outline-dark">
                        <i class="bi bi-search"></i>
                    </a>
                    <a href="{{ route('data-surat.edit', $value->id) }}"
                       class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>

                    <form action="{{ route('data-surat.delete', $value->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash2-fill"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>