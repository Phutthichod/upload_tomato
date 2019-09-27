<?php 
$member = Session::get('member'); ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">

    <!-- icon sidebar -->

    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>

    <?php if ($member) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>general_infomation">
          <i class="menu-icon mdi mdi-home"></i>
          <span class="menu-title">General Infomation</span>
          <i class="menu-arrow"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>physical_search" data-target="#test2">
          <i class="menu-icon mdi mdi-leaf"></i>
          <span class="menu-title">Physical Search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>genome_search">
          <i class="menu-icon mdi mdi-dna"></i>
          <span class="menu-title">Genome Search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>location_search">
          <i class="menu-icon mdi mdi-map-marker"></i>
          <span class="menu-title">Collector search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#test4">
          <i class="menu-icon mdi mdi-sitemap"></i>
          <span class="menu-title">Ontology Search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>


      <?php if ($member['permission'] == 'admin') : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>data_share">
            <i class="menu-icon  mdi mdi-share-variant"></i>
            <span class="menu-title"> Data sharing </span>
            <i class="menu-arrow"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>user_manage">
            <i class="menu-icon mdi mdi-settings"></i>
            <span class="menu-title">User management</span>
            <i class="menu-arrow"></i>
          </a>
        </li>

      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>data_share">
            <i class="menu-icon mdi mdi-share-variant"></i>
            <span class="menu-title"> Data sharing </span>
            <i class="menu-arrow"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>upload">
            <i class="menu-icon fas fa-file-upload"></i>
            <span class="menu-title">Upload accession number</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
      <?php endif; ?>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>general_infomation">
          <i class="menu-icon mdi mdi-home"></i>
          <span class="menu-title">Gerenal Infomation</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>physical_search" data-target="#test2">
          <i class="menu-icon mdi mdi-leaf"></i>
          <span class="menu-title">Physical Search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>genome_search">
          <i class="menu-icon mdi mdi-dna"></i>
          <span class="menu-title">Genome Search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>location_search">
          <i class="menu-icon mdi mdi-map-marker"></i>
          <span class="menu-title">Collector search</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</nav>