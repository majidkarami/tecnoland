<div style="width:95%;margin:30px auto">
    @if(sizeof($item_value)>0)
        <table class="item_table">
            @foreach($items as $key=>$value)

                <tr>
                    <td colspan="4" style="padding-top:15px;padding-bottom:15px"><span class="icon_item_name"></span> <span style="font-size:16px">{{ $value->name }}</span></td>
                </tr>
                <?php
                $get_child_item=$value->get_child_item;
                ?>
                @foreach($get_child_item as $key2=>$value2)
                    <tr>
                        <td class="product_item_name">
                            <p>
                                {{ $value2->name }}
                            </p>
                        </td>
                        <td class="product_item_value">
                            @if($value2->filed==1)

                                <p>
                                    @if(array_key_exists($value2->id,$item_value))
                                        {{ $item_value[$value2->id] }}
                                    @endif
                                </p>
                        </td>
                    </tr>
                    @elseif($value2->filed==2)


                        @if(array_key_exists($value2->id,$item_value))

                            @if($item_value[$value2->id]==1)
                                <p>
                                    <span class="fa fa-check" style="color:green;"></span>
                                </p>
                            @else
                                <p>
                                    <span class="fa fa-close" style="color:red"></span>
                                </p>
                            @endif
                        @endif

                    @else

                        @if(array_key_exists($value2->id,$item_value))
                            <?php

                            $text=explode('@#!',$item_value[$value2->id]);
                            ?>
                            @foreach($text as $key3=>$value3)

                                @if(!empty($value3))

                                    @if($key3==0)
                                        <p>
                                            {{ $value3 }}
                                        </p>
                                        </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="product_item_name"></td>
                                            <td class="product_item_value">
                                                <p>{{ $value3 }}</p>
                                            </td>
                                        </tr>
                                    @endif

                                @endif

                            @endforeach
                        @endif

                    @endif

                @endforeach
            @endforeach
        </table>
    @else

        <p style="color:red;padding-top:30px;padding-bottom: 30px;text-align:center">مشخصات فنی برای این محصول ثبت نشده</p>

    @endif

</div>
