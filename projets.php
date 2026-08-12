<?php
$projets = [
    [
        'titre' => 'Lab de Pentest — Environnement Docker',
        'contexte' => 'TP pratique — Cybersécurité',
        'description' => "Mise en place d'un environnement de test d'intrusion isolé avec Docker, incluant une machine attaquante (Parrot) et une cible vulnérable (Metasploitable2) sur un réseau dédié. Scan réseau et exploitation de vulnérabilités via Metasploit, avec résolution de problèmes de configuration RHOSTS et de connexion à la base PostgreSQL de l'outil.",
        'technos' => ['Docker', 'Kali/Parrot Linux', 'Metasploitable2', 'Metasploit'],
        'competences' => ['Scan réseau', 'Exploitation de vulnérabilités', 'Isolation réseau', 'Sécurité offensive'],
    ],
    [
        'titre' => 'Simulation de phishing avec Gophish',
        'contexte' => 'TP pratique — Cybersécurité',
        'description' => "Déploiement complet d'un lab de simulation de phishing : installation de Gophish, configuration SMTP, mise en place d'une campagne de test. Débogage d'erreurs CSRF, d'URL et d'IP en cours de configuration — l'occasion de comprendre concrètement les mécanismes d'ingénierie sociale évoqués en cours (Cyber Kill Chain, MITRE ATT&CK).",
        'technos' => ['Gophish', 'SMTP', 'Ingénierie sociale'],
        'competences' => ['Sensibilisation à la sécurité', 'Configuration SMTP', 'Débogage réseau'],
    ],
    [
        'titre' => 'Infrastructure multi-VM — Stack LAMP distribuée',
        'contexte' => 'TPs — Réseaux & Systèmes',
        'description' => "Déploiement d'une infrastructure multi-VM sous VirtualBox pour le domaine tdsi-ucad.local : serveur DNS (BIND9), serveur DHCP (ISC-DHCP-Server), serveur web (Apache2/PHP), base de données (MariaDB) et serveur de sauvegarde (Rsync), chacun sur sa propre machine. Complété par un TP de durcissement sécurité incluant Nikto, HTTPS/OpenSSL, vsftpd, Fail2Ban, Samba et un proxy Squid.",
        'technos' => ['Ubuntu Server', 'BIND9', 'ISC-DHCP-Server', 'Apache2', 'MariaDB', 'Rsync'],
        'competences' => ['Architecture réseau distribuée', 'Administration Linux', 'Durcissement système'],
    ],
    [
        'titre' => 'Application PostgreSQL avancée',
        'contexte' => 'Projet universitaire — Bases de données',
        'description' => "Projet approfondi sur la gestion avancée de PostgreSQL : application web full-stack en PHP et Bootstrap 5, appuyée sur des fonctions et triggers PL/pgSQL, la gestion des transactions (avec SAVEPOINT), la gestion des rôles, des vues et des mécanismes d'audit. Accompagné d'un rapport détaillé en français.",
        'technos' => ['PostgreSQL', 'PL/pgSQL', 'PHP', 'Bootstrap 5'],
        'competences' => ['Modélisation de données', 'Logique métier côté base', 'Sécurité des rôles', 'Audit'],
    ],
    [
        'titre' => 'Présentation académique — ArangoDB',
        'contexte' => 'Projet de groupe — Bases de données',
        'description' => "Présentation complète sur les capacités multimodèles d'ArangoDB (document, clé-valeur, graphe), réalisée en binôme. Installation via Docker, manipulation d'AQL, et support de présentation soigné : diaporama HTML stylé et deck Canva avec fonds SVG personnalisés.",
        'technos' => ['ArangoDB', 'Docker', 'AQL'],
        'competences' => ['Bases de données multimodèles', 'Vulgarisation technique', 'Travail en binôme'],
    ],
];

require 'includes/header.php';
?>

<section class="page-hero">
  <div class="wrap">
    <p class="section-label"><span class="prompt">$</span> ls -la projets/</p>
    <h1>Projets &amp; TPs</h1>
    <p class="page-intro">Une sélection de travaux pratiques et de projets réalisés en L3 TDSI — réseaux, cybersécurité, bases de données et développement.</p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="project-list">
      <?php foreach ($projets as $i => $p): ?>
      <article class="project-detail">
        <div class="project-detail-head">
          <span class="project-index"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
          <div>
            <span class="project-context"><?php echo htmlspecialchars($p['contexte']); ?></span>
            <h2><?php echo htmlspecialchars($p['titre']); ?></h2>
          </div>
        </div>
        <p class="project-desc"><?php echo htmlspecialchars($p['description']); ?></p>
        <div class="project-detail-meta">
          <div class="meta-block">
            <span class="meta-label">Technologies</span>
            <div class="tag-row">
              <?php foreach ($p['technos'] as $t): ?>
                <span class="tag"><?php echo htmlspecialchars($t); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="meta-block">
            <span class="meta-label">Compétences démontrées</span>
            <div class="tag-row tag-row-accent">
              <?php foreach ($p['competences'] as $c): ?>
                <span class="tag tag-accent"><?php echo htmlspecialchars($c); ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require 'includes/footer.php'; ?>