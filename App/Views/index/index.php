<?php
       
        // Autor: Diego Oliveira;
        // Github: DiegoOliveiraDvJr;
        // Descrição: Gerador de QR Code;

         //Namespace usando para nomear as classe e evitar conflito de classe iguais
        namespace chillerlan\QRCodeExamples;

        //Estamos usando a classe QRCode do namespace QRCodeExamples
        use chillerlan\QRCode\{QRCode, QROptions};

?>
    <div class="container-fluid p-4 bg-dark">
        <h1 class="mb-4 mt-4 text-center text-white">Gerador de QR code</h1>
    </div>

        <form action="./" method="post" class="container mt-4">
            <div class="row mb-4">
                <div class="col-md-5">
                    <label class="form-label">Nome da imagem</label>
                    <input type="text" class="form-control  mb-3" value="<?php if(isset($_POST['nome'])){echo $_POST['nome'];}?>" placeholder="Nome da imagem (opcional)" name="nome"><button type="submit" class="btn btn-info d-none d-md-block"> Gerar</button>
                </div>  
                <div class="col-md-7">
                    <label class="form-label">Link</label>
                    <input type="text" class="form-control" placeholder="Informe a url" value="<?php if(isset($_POST['url'])){echo $_POST['url'];}?>" name="url" required>
                    <small class="text-info col">
                        <?php
                        if(isset($_POST['url']) && $_POST['url']!= ''){

                            $url = trim($_POST['url']);

                            /*if(isset($_POST['utm_source']) && isset($_POST['utm_medium']) && isset($_POST['utm_campaign']) && $_POST['utm_source'] != '' && $_POST['utm_medium'] != ''  && $_POST['utm_campaign'] != ''){
                                
                                $url = trim($_POST['url']).'?utm_source='.trim($_POST['utm_source']).'&utm_medium='.trim($_POST['utm_medium']).'&utm_campaign='.trim($_POST['utm_campaign']);
                                
                                if(isset($_POST['utm_content']) && isset($_POST['utm_term']) && $_POST['utm_content'] != '' && $_POST['utm_term'] != ''){
                                    $url.= '&utm_content='.trim($_POST['utm_content']).'&utm_term='.trim($_POST['utm_term']);
                                }
                                
                            }*/
                            if($_POST['utm_source'] != '' || $_POST['utm_medium'] != '' || $_POST['utm_campaign'] != '' ||  $_POST['utm_content'] != ''  ||  $_POST['utm_term'] != ''){
                                $url.='?';   
                            }
    
                            if($_POST['utm_source'] != ''){
                                $url.='utm_source='.trim($_POST['utm_source']);
                            }
                            if($_POST['utm_medium'] != '' && $_POST['utm_source'] != ''){
    
                                $url.='&utm_medium='.trim($_POST['utm_medium']);
    
                            }else if($_POST['utm_medium'] != '' && $_POST['utm_source'] == ''){
    
                                $url.='utm_medium='.trim($_POST['utm_medium']);
    
                            }
                            if($_POST['utm_campaign'] != '' && ($_POST['utm_source'] != '' || $_POST['utm_medium'] != '')){
    
                                $url.='&utm_campaign='.trim($_POST['utm_campaign']);
    
                            }else if($_POST['utm_campaign'] != '' && $_POST['utm_source'] == '' && $_POST['utm_medium'] == ''){
    
                                $url.='utm_campaign='.trim($_POST['utm_campaign']);
                                
                            }
                            if($_POST['utm_content'] != '' && ($_POST['utm_source'] != '' || $_POST['utm_medium'] != '' || $_POST['utm_campaign'] != '')){
    
                                $url.='&utm_content='.trim($_POST['utm_content']);
    
                            }else if($_POST['utm_content'] != '' && $_POST['utm_source'] == '' && $_POST['utm_medium'] == '' && $_POST['utm_campaign'] == ''){
    
                                $url.='utm_content='.trim($_POST['utm_content']);
                                
                            }
                            if($_POST['utm_term'] != '' && ($_POST['utm_source'] != '' || $_POST['utm_medium'] != '' || $_POST['utm_campaign'] != '' || $_POST['utm_content'] != '')){
    
                                $url.='&utm_term='.trim($_POST['utm_term']);
    
                            }else if($_POST['utm_term'] != '' && $_POST['utm_source'] == '' && $_POST['utm_medium'] == '' && $_POST['utm_campaign'] == '' && $_POST['utm_content'] == ''){
    
                                $url.='utm_term='.trim($_POST['utm_term']);
                                
                            }
                            if($_POST['utm_id'] != '' && ($_POST['utm_source'] != '' || $_POST['utm_medium'] != '' || $_POST['utm_campaign'] != '' || $_POST['utm_content'] != '' || $_POST['utm_term'] != '')){
    
                                $url.='&utm_id='.trim($_POST['utm_id']);
    
                            }else if($_POST['utm_id'] != '' && $_POST['utm_source'] == '' && $_POST['utm_medium'] == '' && $_POST['utm_campaign'] == '' && $_POST['utm_content'] == '' && $_POST['utm_term'] == ''){
    
                                $url.='utm_id='.trim($_POST['utm_id']);
                                
                            }

                            echo $url;

                        }    
                        ?></small>
                </div>
            </div>  
            <div class="row">
                <h4 class="mb-3">Opções de Marketing</h4>
                <div class="col-md-5">
                    <div class="mb-3 col-md-12">
                        <label class="form-label">utm_id</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['url'])){echo $_POST['utm_id'];}?>" placeholder="" name="utm_id">
                        <small class="text-info">Deixe vazio se não quiser atribuir</small>
                    </div> 
                    <div class="mb-3 col-md-12">
                        <label class="form-label">utm_source</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['url'])){echo $_POST['utm_source'];}?>" placeholder="" name="utm_source">
                        <small class="text-info">Deixe vazio se não quiser atribuir</small>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">utm_medium</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['url'])){echo $_POST['utm_medium'];}?>" placeholder="" name="utm_medium">
                        <small class="text-info">Deixe vazio se não quiser atribuir</small>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">utm_campaign</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['url'])){echo $_POST['utm_campaign'];}?>" placeholder="" name="utm_campaign">
                        <small class="text-info">Deixe vazio se não quiser atribuir</small>
                    </div> 
                    <div class="mb-3 col-md-12">
                        <label class="form-label">utm_content</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['url'])){echo $_POST['utm_content'];}?>" placeholder="" name="utm_content">
                        <small class="text-info">Deixe vazio se não quiser atribuir</small>
                    </div> 
                    <div class="mb-3 col-md-12">
                        <label class="form-label">utm_term</label>
                        <input type="text" class="form-control" value="<?php if(isset($_POST['url'])){echo $_POST['utm_term'];}?>" placeholder="" name="utm_term">
                        <small class="text-info">Deixe vazio se não quiser atribuir</small>
                    </div> 
                    
                    <button type="submit" class="btn btn-info d-md-none"> Gerar</button>
                </div> 
                <?php

                    if(isset($_POST['url']) && $_POST['url']!= ''){

                        //Incluir Composer
                        include '../vendor/autoload.php';

                       
                        //Configurações do QRCode
                        $options = new QROptions([
                            'version'    => QRCode::VERSION_AUTO,
                            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
                            'eccLevel'   => QRCode::ECC_L,
                            
                        ]);

                        //invoca uma nova instância QRCode
                        $qrcode = new QRCode($options);

                        //Gerar a imagem do QR
                        //$qrcode->render($url);
                        if( isset($_POST['nome']) && $_POST['nome'] !=''){
                            $nome = $_POST['nome'].'.svg';  
                        }else{
                            $nome = uniqid().'.svg';
                        }

                        if(file_exists('imgqrcode/'.$nome)){
                            unlink('imgqrcode/'.$nome);
                        }
                        //Gerar a imagem e salvar a imagem do QR no servidor
                        $qrcode->render($url, 'imgqrcode/'.$nome);

                        echo '<div class="col-md-7 mt-2 mt-md-0"><a class="btn btn-primary col-md-3" href="imgqrcode/'.$nome.'" download>Baixar imagem</a><img src="imgqrcode/'.$nome.'" class="img-fluid col-md-7"></div>';
                    }   

                ?>   
            </div>   
        </form>



