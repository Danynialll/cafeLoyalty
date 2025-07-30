
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Membership Barcode</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-4 text-center" style="width: 100%; max-width: 500px; background-color: #79b3edff; justify-content: center; align-items: center;">
  <h4 class="mb-3">Your Membership Barcode</h4>
  <p><strong>ID:</strong> <?= $membership_id ?></p>

  <svg id="barcode" style="display: block; margin: 0 auto;"></svg>

  <button id="downloadBtn" class="btn btn-success mt-3">Download PNG</button>
</div>

<script>
  const membershipId = "<?= $membership_id ?>";

  // Generate barcode
  JsBarcode("#barcode", membershipId, {
    format: "CODE39",
    displayValue: true,
    lineColor: "#000",
    width: 2,
    height: 100,
    margin: 10
  });

  // Download barcode as PNG
  document.getElementById('downloadBtn').addEventListener('click', function () {
    const svgElement = document.getElementById("barcode");
    const svgData = new XMLSerializer().serializeToString(svgElement);
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");
    const img = new Image();

    img.onload = function () {
      canvas.width = img.width;
      canvas.height = img.height;
      ctx.drawImage(img, 0, 0);
      const png = canvas.toDataURL("image/png");
      const a = document.createElement("a");
      a.href = png;
      a.download = "barcode.png";
      a.click();
    };

    img.src = 'data:image/svg+xml;base64,' + btoa(svgData);
  });
</script>

</body>
</html>
