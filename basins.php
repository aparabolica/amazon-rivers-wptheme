<?php
/*
 * Template name: Basins Template
 */
?>
<?php get_header(); ?>

<section id="main-map">
  <?php get_template_part('parts/map'); ?>
</section>

<section id="basins-selector">
  <div class="basins-selector-content">
    <h3><?php _e('Select a basin for details:', 'arp'); ?></h3>
    <div class="basin-item">
      <h2>Madeira</h2>
    </div>
    <div class="basin-item">
      <h2>Tapajós</h2>
      <div class="basin-description">
        <p>A bacia do rio Tapajós abrange 492.000 km2 nos estados de Mato Grosso, Pará, Amazonas e uma pequena porção de Rondônia, no Brasil. Localizada na fronteira da frente de desmatamento da Amazônia brasileira, é uma região ainda muito preservada, que funciona como uma grande muralha verde e impede que o desmatamento - impulsionado tanto pela produção de commodities, na área de transição com o Cerrado, como pela proliferação de pequenas propriedades ao longo das rodovias BR-163 (Cuiabá-Santarém) e BR-230 (Transamazônica) - avance de leste para o oeste e de sul para o norte.</p>

        <p>Além disso, o rio Tapajós é o único dos grandes afluentes da margem direita do rio Amazonas ainda não represado para produção de eletricidade em larga escala. Atualmente, porém, a bacia do Rio Tapajós é considerada a grande fronteira hidrelétrica e de desenvolvimento econômico na Amazônia.</p>

        <p>Os principais afluentes do Tapajós são os rios Jamanxim, Crepori, Teles Pires e Juruena. As cabeceiras dos rios Juruena e Teles Pires estão em uma área de Cerrado, já bastante alterada, que é gradativamente substituída pela floresta amazônica ao norte, ao longo de uma extensa área de transição, também altamente antropizada. À medida que se segue em direção ao rio Amazonas, predominam florestas ombrófilas abertas e florestas ombrófilas densas, com encraves de florestas estacionais, campos e campinaranas, e florestas aluviais ao longo dos rios.</p>
      </div>
    </div>
    <div class="basin-item">
      <h2>Marañón</h2>
    </div>
  </div>
</section>

<?php //get_footer(); ?>
