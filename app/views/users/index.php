<ul>
    <li>
        <a href="<?= URLROOT; ?>/landingpages/index">Ga terug naar de hoofdpagina!</a>
    </li>
</ul>

<h1><?= $data['title'] ?> <br></h1>
<h4><?= $data['description']?></h4>

<table>
    <thead>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Telefoonnummer</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>

<h1><?= $data['privacy']?></h1>
