<?php include 'head.php';?>

<div class="content-body">
  <h1>Create</h1>
  <form>
  <div class="form-group">
    <label for="SongTitle">Song Title:</label>
    <input type="text" class="form-control" id="SongTitle" placeholder="Enter song title">
  </div>
  <div class="form-group">
    <label for="SongArtist">Artist:</label>
    <input type="text" class="form-control" id="SongArtist" placeholder="Enter artist">
  </div>
  <div class="form-group">
  <label for="SongGenre">Select Genre:</label>
  <select class="form-control" id="SongGenre">
    <option>Pop</option>
    <option>Rock</option>
    <option>Jazz</option>
    <option>Alternative</option>
    <option>SLow</option>
  </select>
  </div>
  <div class="form-group">
  <label for="SongUpload">Import Music</label>
  <input type="file" class="form-control-file" id="SongUpload">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

<?php include 'footer.php';?>
