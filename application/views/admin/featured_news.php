<!DOCTYPE html>
<html lang="en">
<head>
   <title>Makeifly - Travel Blog | Manage Featured News</title>

   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   
   <!-- Icons -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css')?>">
   
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css')?>">
   
   <!-- jQuery UI for drag-and-drop -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.css')?>">
   
   <style>
      .sortable-list {
         list-style: none;
         padding: 0;
      }
      
      .sortable-item {
         background: #fff;
         border: 1px solid #ddd;
         margin-bottom: 10px;
         padding: 15px;
         border-radius: 4px;
         cursor: move;
         display: flex;
         justify-content: space-between;
         align-items: center;
         transition: all 0.3s ease;
      }
      
      .sortable-item:hover {
         box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
         background: #f9f9f9;
      }
      
      .sortable-item.ui-sortable-helper {
         opacity: 0.8;
         box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
      }
      
      .sortable-item .item-info {
         flex: 1;
      }
      
      .sortable-item .item-image {
         width: 60px;
         height: 60px;
         margin-right: 15px;
         border-radius: 4px;
         object-fit: cover;
      }
      
      .sortable-item .item-details {
         display: flex;
         align-items: center;
         flex: 1;
      }
      
      .sortable-item .item-title {
         font-weight: 500;
         color: #333;
         margin-bottom: 5px;
         max-width: 500px;
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
      }
      
      .sortable-item .item-category {
         font-size: 12px;
         color: #999;
      }
      
      .sortable-item .item-order {
         font-size: 14px;
         background: #f0f0f0;
         padding: 4px 8px;
         border-radius: 3px;
         margin-left: 15px;
         min-width: 50px;
         text-align: center;
      }
      
      .sortable-item .item-actions {
         margin-left: 15px;
      }
      
      .sortable-item .item-actions button {
         margin-left: 5px;
      }
      
      .featured-badge {
         display: inline-block;
         background: #28a745;
         color: white;
         padding: 3px 8px;
         border-radius: 3px;
         font-size: 11px;
         font-weight: bold;
      }
      
      .featured-badge.inactive {
         background: #dc3545;
      }
      
      .add-featured-form {
         background: #f9f9f9;
         padding: 20px;
         border-radius: 4px;
         margin-bottom: 30px;
      }
      
      .add-featured-form h5 {
         margin-bottom: 15px;
         color: #333;
      }
      
      .drag-handle {
         cursor: grab;
         color: #999;
         margin-right: 10px;
         font-size: 16px;
      }
      
      .drag-handle:active {
         cursor: grabbing;
      }
   </style>

</head>

<body class="sidebar-mini fixed">
   
   <div class="wrapper">
      <!-- Navbar-->
      <?php include APPPATH.'views/admin/include/header.php';?>
      
      <!-- Side-Nav-->
      <?php include APPPATH.'views/admin/include/sidebar.php';?>
      
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>Manage Featured News</h4>
               </div>
            </div>
            
            <!-- Alert Messages (uses session flashdata keys: success, error, info, warning) -->
            <?php
               $flash_types = [
                  'success' => 'alert-success',
                  'error'   => 'alert-danger',
                  'info'    => 'alert-info',
                  'warning' => 'alert-warning'
               ];

               foreach($flash_types as $key => $class) {
                  if($this->session->flashdata($key)) {
                     ?>
                     <div class="alert <?php echo $class;?> alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata($key);?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <?php
                  }
               }
            ?>

            <!-- Container for AJAX-generated flash alerts -->
            <div id="ajax-flash-container" style="position:fixed; top:70px; right:20px; z-index:2050; width:360px;"></div>
            
            <!-- Add Featured News Section -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-block">
                        <div class="add-featured-form">
                           <h5><i class="icon-plus"></i> Add News to Featured</h5>
                           <form id="add-featured-form" method="post" action="<?php echo site_url('admin/Featured_news/add_featured_ajax');?>">
                              <div class="row">
                                 <div class="col-sm-8">
                                    <select name="news_id" id="news_id" class="form-control" required>
                                       <option value="">-- Select a News Article --</option>
                                       <?php if(isset($available_news) && count($available_news) > 0):?>
                                          <?php foreach($available_news as $news):?>
                                             <option value="<?php echo $news->id;?>">
                                                <?php echo $news->newtitle;?>
                                             </option>
                                          <?php endforeach;?>
                                       <?php endif;?>
                                    </select>
                                 </div>
                                 <div class="col-sm-3">
                                    <input type="number" name="order" id="order" class="form-control" placeholder="Order (optional)" min="0">
                                 </div>
                                 <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary btn-block">
                                       <i class="icon-plus"></i> Add
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            <!-- Featured News List -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header">
                        <h5>Currently Featured Articles
                           <span class="badge badge-primary" id="featured-count">
                              <?php echo isset($featured_articles) ? count($featured_articles) : 0;?>
                           </span>
                        </h5>
                     </div>
                     <div class="card-block">
                        <?php if(isset($featured_articles) && count($featured_articles) > 0):?>
                           <p class="text-muted" style="margin-bottom: 20px;">
                              <i class="icon-info"></i> Drag and drop to reorder featured articles
                           </p>
                           
                           <ul class="sortable-list" id="featured-list">
                              <?php $counter = 1;?>
                              <?php foreach($featured_articles as $article):?>
                                 <li class="sortable-item" data-id="<?php echo $article->id;?>" data-news-id="<?php echo $article->news_id;?>">
                                    <span class="drag-handle">≡</span>
                                    
                                    <div class="item-details">
                   <?php if(!empty($article->Upload_Image)):?>
                 <!-- Use uploads/files path for stored images to prevent 404. Add safe onerror fallback. -->
                 <img src="<?php echo base_url('uploads/files/'. $article->Upload_Image);?>" 
                      alt="<?php echo $article->newtitle;?>" 
                      class="item-image"
                      onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/avatar-1.png');?>'">
                   <?php else:?>
                 <img src="<?php echo base_url('assets/images/avatar-1.png');?>" 
                      alt="No image" 
                      class="item-image">
                   <?php endif;?>
                                       
                                       <div class="item-info">
                                          <div class="item-title"><?php echo $article->newtitle;?></div>
                                          <div class="item-category">
                                             Category: <strong><?php echo $article->Category;?></strong>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <div class="item-order">
                                       Order: <span class="order-value"><?php echo $counter++; ?></span>
                                    </div>
                                    
                                    <div class="item-actions">
                                       <button type="button" class="btn btn-sm btn-info toggle-featured" 
                                               data-id="<?php echo $article->id;?>" 
                                               data-status="1"
                                               title="Deactivate">
                                          <i class="icon-eye"></i> Active
                                       </button>
                                       <a href="<?php echo site_url('admin/Featured_news/remove/'.$article->id);?>" 
                                          class="btn btn-sm btn-danger" 
                                          onclick="return confirm('Remove from featured?');">
                                          <i class="icon-trash"></i> Remove
                                       </a>
                                    </div>
                                 </li>
                              <?php endforeach;?>
                           </ul>
                           
                           <div style="margin-top: 20px;">
                              <button type="button" class="btn btn-success" id="save-order-btn">
                                 <i class="icon-check"></i> Save Order
                              </button>
                           </div>
                           
                        <?php else:?>
                           <div class="alert alert-info" role="alert">
                              <i class="icon-info"></i> No featured articles yet. Add one using the form above.
                           </div>
                        <?php endif;?>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
         <!-- Main content ends -->
         <!-- Container-fluid ends -->
      </div>
      
      <!-- Footer -->
      <?php include APPPATH.'views/admin/include/footer.php';?>
      
   </div>
   
   <!-- Scripts -->
   <script src="<?php echo base_url('assets/js/jquery-3.6.1.js')?>"></script>
   <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
   <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
   
   <script>
      $(document).ready(function() {
         
         // Initialize sortable
         $("#featured-list").sortable({
            handle: ".drag-handle",
            placeholder: "ui-sortable-placeholder",
            update: function(event, ui) {
               // Update order values
               updateOrderDisplay();
            }
         });
         $("#featured-list").disableSelection();
         
         // Update order display
         function updateOrderDisplay() {
            $("#featured-list li").each(function(index) {
               // display as 1-based index for human-friendly numbering
               $(this).find(".order-value").text(index + 1);
            });
         }

         // Helper to show Bootstrap alerts for AJAX actions
         function showAlert(type, message, autoClose = true) {
            var alertClass = 'alert-' + (type === 'danger' ? 'danger' : (type === 'error' ? 'danger' : type));
            var $alert = $(
               '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                  $('<div>').text(message).html() +
                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                     '<span aria-hidden="true">&times;</span>' +
                  '</button>' +
               '</div>'
            );

            $('#ajax-flash-container').append($alert);

            if(autoClose) {
               setTimeout(function() {
                  $alert.alert('close');
               }, 4000);
            }
         }
         
         // Save order
         $("#save-order-btn").click(function() {
            var articles = [];
            $("#featured-list li").each(function(index) {
               articles.push({
                  id: $(this).data('id'),
                  order: index
               });
            });
            
            $.ajax({
               url: "<?php echo site_url('admin/Featured_news/update_order_ajax');?>",
               type: "POST",
               dataType: "json",
               data: {articles: articles},
               success: function(response) {
                  if(response.success) {
                     showAlert('success', response.message || 'Order saved successfully!');
                  } else {
                     showAlert('danger', response.message || 'Error saving order');
                  }
               },
               error: function() {
                  showAlert('danger', 'Error saving order. Please try again.');
               }
            });
         });
         
         // Toggle featured status
         $(".toggle-featured").click(function() {
            var btn = $(this);
            var id = btn.data('id');
            var status = btn.data('status');
            var newStatus = status == 1 ? 0 : 1;
            
            $.ajax({
               url: "<?php echo site_url('admin/Featured_news/toggle_featured_ajax');?>",
               type: "POST",
               dataType: "json",
               data: {id: id, is_featured: newStatus},
               success: function(response) {
                  if(response.success) {
                     if(newStatus == 0) {
                        btn.removeClass('btn-info').addClass('btn-warning')
                           .html('<i class="icon-eye-off"></i> Inactive')
                           .data('status', 0);
                     } else {
                        btn.removeClass('btn-warning').addClass('btn-info')
                           .html('<i class="icon-eye"></i> Active')
                           .data('status', 1);
                     }
                     showAlert('success', response.message || 'Status updated successfully!');
                  } else {
                     showAlert('danger', response.message || 'Error updating status');
                  }
               },
               error: function() {
                  showAlert('danger', 'Error updating status. Please try again.');
               }
            });
         });
         
         // Add featured form
         $("#add-featured-form").submit(function(e) {
            e.preventDefault();
            
            var form = $(this);
            var newsId = $("#news_id").val();
            var order = $("#order").val() || 0;
            
            if(!newsId) {
               alert('Please select a news article');
               return false;
            }
            
            $.ajax({
               url: form.attr('action'),
               type: "POST",
               dataType: "json",
               data: {news_id: newsId, order: order},
               success: function(response) {
                  if(response.success) {
                     showAlert('success', response.message || 'Article added to featured successfully');
                     // small delay so the user sees the alert, then reload to show new item
                     setTimeout(function(){ location.reload(); }, 800);
                  } else {
                     showAlert('danger', response.message || 'Error adding featured article');
                  }
               },
               error: function() {
                  showAlert('danger', 'Error adding featured article. Please try again.');
               }
            });
         });
         
      });
   </script>

</body>

</html>
