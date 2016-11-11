<div class="fl_section">
      <nav class="">
        <ul>
        @foreach($categorys as $category)
            @if($category->parent==0)

            <?php $flag = false; ?>
                              @foreach($categorys as $childcate)
                                    <?php if($category->id==$childcate->parent)
                                          {
                                            $flag = true;
                                          break;
                                        }
                                    ?>
                              @endforeach

                      <li> <a href="{{Asset("category/".$category->id.'-'.$category->url)}}" title="{{$category->name}}">{{$category->name}} <?php if($flag) echo '<i class="fa fa-caret-down">'?></i>
                              </a>
                              

                              <?php if($flag) echo '<ul class="left">';?>
                              @foreach($categorys as $childcate)
                                    @if($category->id==$childcate->parent)
                                      <li><i class="fa fa-circle"></i> <a href="{{Asset('category/'.$childcate->id.'-'.$childcate->url)}}" title="{{$childcate->name}}">{{$childcate->name}}</a></li>
                                    @endif
                              @endforeach   
                              <?php if($flag) echo "</ul>";?>
                    </li>
           @endif
        @endforeach
                  </ul>
      </nav>
    </div>