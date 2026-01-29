<?php
$query = isset($_GET['query']) ? urlencode(trim($_GET['query'])) : '';

$results = [];
if (!empty($query)) {
    $apiUrl = "http://universities.hipolabs.com/search?name={$query}";
    $response = file_get_contents($apiUrl);
    if ($response !== false) {
        $results = json_decode($response, true);
    }
}
// === 2. Your custom websites list ===
$customWebsites = [
  [
      "name" => "Coursera",
      "country" => "Global",
      "url" => "https://www.coursera.org"
  ],
  [
      "name" => "edX",
      "country" => "Global",
      "url" => "https://www.edx.org"
  ],
  [
      "name" => "MIT OpenCourseWare",
      "country" => "USA",
      "url" => "https://ocw.mit.edu"
  ],
  [
      "name" => "Khan Academy",
      "country" => "Global",
      "url" => "https://www.khanacademy.org"
  ],
  //----Indian Universities-----
  [
    "name" => "NPTEL",
    "country" => "India (Chennai)",
    "url" => "https://nptel.ac.in"
],
[
    "name" => "SWAYAM",
    "country" => "India (New Delhi)",
    "url" => "https://swayam.gov.in"
],
[
    "name" => "IIT Bombay",
    "country" => "India (Mumbai)",
    "url" => "https://www.iitb.ac.in"
],
[
    "name" => "IIT Delhi",
    "country" => "India (New Delhi)",
    "url" => "https://home.iitd.ac.in"
],
[
    "name" => "IIT Madras",
    "country" => "India (Chennai)",
    "url" => "https://www.iitm.ac.in"
],
[
    "name" => "IIT Kanpur",
    "country" => "India (Kanpur)",
    "url" => "https://www.iitk.ac.in"
],
[
    "name" => "Anna University",
    "country" => "India (Chennai)",
    "url" => "https://www.annauniv.edu"
],
[
    "name" => "Amity University",
    "country" => "India (Noida)",
    "url" => "https://www.amity.edu"
],
[
    "name" => "Delhi University",
    "country" => "India (New Delhi)",
    "url" => "http://www.du.ac.in"
],
[
    "name" => "IGNOU",
    "country" => "India (New Delhi)",
    "url" => "http://www.ignou.ac.in"
],
[
    "name" => "BITS Pilani",
    "country" => "India (Pilani)",
    "url" => "https://www.bits-pilani.ac.in"
],
[
    "name" => "University of Mumbai",
    "country" => "India (Mumbai)",
    "url" => "https://mu.ac.in"
],
[
    "name" => "Savitribai Phule Pune University",
    "country" => "India (Pune)",
    "url" => "http://www.unipune.ac.in"
],
[
    "name" => "Tata Institute of Social Sciences (TISS)",
    "country" => "India (Mumbai)",
    "url" => "https://www.tiss.edu"
],
[
    "name" => "Symbiosis International University",
    "country" => "India (Pune)",
    "url" => "https://www.symbiosis.ac.in"
],
[
    "name" => "College of Engineering Pune (COEP)",
    "country" => "India (Pune)",
    "url" => "https://www.coep.org.in"
],
[
    "name" => "VJTI Mumbai",
    "country" => "India (Mumbai)",
    "url" => "https://www.vjti.ac.in"
],
[
    "name" => "SP Jain Institute of Management and Research (SPJIMR)",
    "country" => "India (Mumbai)",
    "url" => "https://www.spjimr.org"
],
[
    "name" => "MIT World Peace University",
    "country" => "India (Pune)",
    "url" => "https://www.mitwpu.edu.in"
],
[
    "name" => "Bharati Vidyapeeth Deemed University",
    "country" => "India (Pune)",
    "url" => "https://bvuniversity.edu.in"
],
[
    "name" => "Nagpur University (Rashtrasant Tukadoji Maharaj Nagpur University)",
    "country" => "India (Nagpur)",
    "url" => "https://www.nagpuruniversity.ac.in"
],
[
    "name" => "Shivaji University",
    "country" => "India (Kolhapur)",
    "url" => "https://www.unishivaji.ac.in"
],
[
    "name" => "Dr. Babasaheb Ambedkar Technological University",
    "country" => "India (Lonere, Raigad)",
    "url" => "https://dbatu.ac.in"
],
[
    "name" => "Dr. D Y Patil Technical Campus",
    "country" => "India (Pune, Talegaon)",
    "url" => "https://dypatiltcs.com"
],
//USA Universities
[
  "name" => "Harvard University",
  "country" => "USA (Cambridge, Massachusetts)",
  "url" => "https://www.harvard.edu"
],
[
  "name" => "Stanford University",
  "country" => "USA (Stanford, California)",
  "url" => "https://www.stanford.edu"
],
[
  "name" => "Massachusetts Institute of Technology (MIT)",
  "country" => "USA (Cambridge, Massachusetts)",
  "url" => "https://www.mit.edu"
],
[
  "name" => "California Institute of Technology (Caltech)",
  "country" => "USA (Pasadena, California)",
  "url" => "https://www.caltech.edu"
],
[
  "name" => "Princeton University",
  "country" => "USA (Princeton, New Jersey)",
  "url" => "https://www.princeton.edu"
],
//Malaysia Universities
[
  "name" => "University of Malaya (UM)",
  "country" => "Malaysia (Kuala Lumpur)",
  "url" => "https://www.um.edu.my"
],
[
  "name" => "Universiti Teknologi Malaysia (UTM)",
  "country" => "Malaysia (Skudai, Johor)",
  "url" => "https://www.utm.my"
],
[
  "name" => "Monash University Malaysia",
  "country" => "Malaysia (Bandar Sunway)",
  "url" => "https://www.monash.edu.my"
],
[
  "name" => "Asia Pacific University (APU)",
  "country" => "Malaysia (Kuala Lumpur)",
  "url" => "https://www.apu.edu.my"
],
[
  "name" => "Universiti Putra Malaysia (UPM)",
  "country" => "Malaysia (Serdang, Selangor)",
  "url" => "https://www.upm.edu.my"
],
//Maldives Universities
[
  "name" => "Maldives National University",
  "country" => "Maldives (Malé)",
  "url" => "https://www.mnu.edu.mv"
],
[
  "name" => "The Maldives Islamic University",
  "country" => "Maldives (Malé)",
  "url" => "http://www.miugov.mv"
],
//South Africa Universities
[
  "name" => "University of Cape Town",
  "country" => "South Africa (Cape Town)",
  "url" => "https://www.uct.ac.za"
],
[
  "name" => "University of Witwatersrand",
  "country" => "South Africa (Johannesburg)",
  "url" => "https://www.wits.ac.za"
],
[
  "name" => "Stellenbosch University",
  "country" => "South Africa (Stellenbosch)",
  "url" => "https://www.sun.ac.za"
],
[
  "name" => "University of Pretoria",
  "country" => "South Africa (Pretoria)",
  "url" => "https://www.up.ac.za"
],
//Germany Universities
[
  "name" => "Ludwig Maximilian University of Munich (LMU)",
  "country" => "Germany (Munich)",
  "url" => "https://www.en.uni-muenchen.de"
],
[
  "name" => "Technical University of Munich (TUM)",
  "country" => "Germany (Munich)",
  "url" => "https://www.tum.de"
],
[
  "name" => "Heidelberg University",
  "country" => "Germany (Heidelberg)",
  "url" => "https://www.uni-heidelberg.de"
],
[
  "name" => "Humboldt University of Berlin",
  "country" => "Germany (Berlin)",
  "url" => "https://www.hu-berlin.de"
],
//China Universities
[
  "name" => "Peking University",
  "country" => "China (Beijing)",
  "url" => "https://www.pku.edu.cn"
],
[
  "name" => "Tsinghua University",
  "country" => "China (Beijing)",
  "url" => "https://www.tsinghua.edu.cn"
],
[
  "name" => "Fudan University",
  "country" => "China (Shanghai)",
  "url" => "https://www.fudan.edu.cn"
],
[
  "name" => "Shanghai Jiao Tong University",
  "country" => "China (Shanghai)",
  "url" => "https://www.sjtu.edu.cn"
],
//Australia Universities
[
  "name" => "University of Melbourne",
  "country" => "Australia (Melbourne, Victoria)",
  "url" => "https://www.unimelb.edu.au"
],
[
  "name" => "Australian National University (ANU)",
  "country" => "Australia (Canberra, ACT)",
  "url" => "https://www.anu.edu.au"
],
[
  "name" => "University of Sydney",
  "country" => "Australia (Sydney, New South Wales)",
  "url" => "https://www.sydney.edu.au"
],
[
  "name" => "University of Queensland",
  "country" => "Australia (Brisbane, Queensland)",
  "url" => "https://www.uq.edu.au"
],
//United Kingdom Universities
[
  "name" => "University of Oxford",
  "country" => "United Kingdom (Oxford)",
  "url" => "https://www.ox.ac.uk"
],
[
  "name" => "University of Cambridge",
  "country" => "United Kingdom (Cambridge)",
  "url" => "https://www.cam.ac.uk"
],
[
  "name" => "Imperial College London",
  "country" => "United Kingdom (London)",
  "url" => "https://www.imperial.ac.uk"
],
[
  "name" => "London School of Economics and Political Science (LSE)",
  "country" => "United Kingdom (London)",
  "url" => "https://www.lse.ac.uk"
],
//Japan Universities
[
  "name" => "The University of Tokyo",
  "country" => "Japan (Tokyo)",
  "url" => "https://www.u-tokyo.ac.jp"
],
[
  "name" => "Kyoto University",
  "country" => "Japan (Kyoto)",
  "url" => "https://www.kyoto-u.ac.jp"
],
[
  "name" => "Osaka University",
  "country" => "Japan (Osaka)",
  "url" => "https://www.osaka-u.ac.jp"
],
//Singapore Universities
[
  "name" => "National University of Singapore (NUS)",
  "country" => "Singapore (Singapore)",
  "url" => "https://www.nus.edu.sg"
],
[
  "name" => "Nanyang Technological University (NTU)",
  "country" => "Singapore (Singapore)",
  "url" => "https://www.ntu.edu.sg"
]




];

// === 3. Filter custom sites and add to results if matching search ===
foreach ($customWebsites as $site) {
  if (stripos($site['name'], $query) !== false) {
      $results[] = [
          "name" => $site['name'],
          "country" => $site['country'],
          "web_pages" => [$site['url']]
      ];
  }
}
?>

<!DOCTYPE ht[
     ml>
<html>
<head>
    <title>Search Results</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px;
            background: linear-gradient(to right, #ece9e6, #ffffff);
            color: #333;
        }

        h1 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .results-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: auto;
            animation: fadeIn 0.5s ease-in;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card a {
            color: #007BFF;
            text-decoration: none;
        }

        .card a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .no-results {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Search Results for "<?php echo htmlspecialchars($_GET['query']); ?>"</h1>

    <?php if (empty($results)): ?>
        <p>No universities found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($results as $university): ?>
                <li>
                    <strong><?php echo htmlspecialchars($university['name']); ?></strong><br>
                    Country: <?php echo htmlspecialchars($university['country']); ?><br>
                    Website: <a href="<?php echo $university['web_pages'][0]; ?>" target="_blank">
                        <?php echo $university['web_pages'][0]; ?>
                    </a>
                </li><br>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
