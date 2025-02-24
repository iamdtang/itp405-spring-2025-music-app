<table border="1" cellpadding="3" cellspacing="0">
  <tr>
    <th>Track</th>
    <th>Genre ID</th>
    <th>Genre</th>
    <th>Album ID</th>
    <th>Album</th>
  </tr>
  @foreach ($tracks as $track)
    <tr>
      <td>{{ $track->Name }}</td>
      <td>{{ $track->GenreId }}</td>
      <td>{{ $track->genre->Name }}</td>
      <td>{{ $track->AlbumId }}</td>
      <td>{{ $track->album->Title }}</td>
    </tr>
  @endforeach
</table>