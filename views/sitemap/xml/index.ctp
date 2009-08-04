<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo Router::url('/',true); ?></loc>
        <changefreq><?php echo $site['changefreq']; ?></changefreq>
        <priority><?php echo $site['priority']; ?></priority>
    </url>
<?php    
foreach($items as $item):
    foreach($item['items'] as $url):
  ?>
  <url>
    <loc><?php
        echo Router::url(array(
                          'plugin' => $item['plugin'],
                          'controller'=>$item['controller'], 
                          'action'=>$item['action'],
                          $url[$item['model']][$item['field']]),true);
    ?></loc>
    <?php 
        if(isset($url[$item['model']]['modified'])): 
          $date = $url[$item['model']]['modified'];
        elseif(isset($url[$item['model']]['updated'])):
          $date = $url[$item['model']]['updated'];          
        endif;
        
        if(isset($date)):
    ?>
      <lastmod><?php echo $time->toAtom($date); ?></lastmod>
    <?php endif; ?>
    <?php if(isset($item['changefreq'])): ?>
      <changefreq><?php echo $item['changefreq']; ?></changefreq>
    <?php endif; ?>
    <?php if(isset($item['priority'])): ?>
      <priority><?php echo $item['priority']; ?></priority>
    <?php endif; ?>
  </url>
<?php
    endforeach;
endforeach;
?>
</urlset> 