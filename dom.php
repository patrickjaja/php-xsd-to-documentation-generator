<?php 
$dom["theme1"]["page"]='<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>'.l8n::getText("docu_title").'</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="agency.css" rel="stylesheet">

    <link href="_fonts/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="_images/logo.png"/></a>
                <span  style="font-size:14px;margin-left:5px;" class="navbar-brand page-scroll">
                    <span style="margin-left:10px;">'.l8n::getText("api_search").'</span>
                    <form id="f1" style="margin-left: 10px;" name="f1" action="javascript:void()" onsubmit="if(this.t1.value!=null &amp;&amp; this.t1.value!=\'\')
                        parent.findString(this.t1.value);return false;">
                        <input type="text" id="t1" name="t1" value="" size="18" style="color:#000;height:20px;font-size:12px;font-family: Montserrat,Helvetica,Arial,sans-serif;">
                        <!--<input type="submit" name="b1" value="Find" style="font-size:12px;">-->
                    </form>
                </span>
                <span style="font-size:14px;margin-left:15px;" class="navbar-brand page-scroll">'.l8n::getText("api_docu_head").'
                    <span style="padding-left:10px;">
                        <br/>
                        <a href="?lang=de"><img src="_images/1408206596_de.png" style="margin-right:5px;"/></a>
                        <a href="?lang=en"><img src="_images/1408206683_gb.png" style="margin-right:5px;"/></a>
                        <a href="?lang=en"><img src="_images/1408324235_es.png" style="margin-right:5px;"/></a>
                        <a href="?lang=ru"><img src="_images/1408207626_ru.png"/></a>
                    </span>
                </span>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">'.l8n::getText("general").'</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#stammdaten_overview"><span class="badge pull-right" style="margin-left:5px;">##STAMMDATENCOUNT##</span>'.l8n::getText("stammdaten").'</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#ergebnisse_overview"><span class="badge pull-right" style="margin-left:5px;">##ERGEBNISSECOUNT##</span>'.l8n::getText("ergebnisse").'</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#einstellungen_overview"><span class="badge pull-right" style="margin-left:5px;">##EINSTELLUNGENCOUNT##</span>'.l8n::getText("einstellungen").'</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">'.l8n::getText("start_first").'</div>
                <div class="intro-heading">'.l8n::getText("start_second").'</div>
                <a href="#services" class="page-scroll btn btn-xl">'.l8n::getText("learn_more").'</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">'.l8n::getText("general").'</h2>
                    <h3 class="section-subheading text-muted">'.l8n::getText("general_sub").'</h3>
                </div>
            </div>        
            <div class="list-group">
                    <a href="#" class="list-group-item disabled">Systemvorraussetzungen (Chrome)</a>
                    <a href="#" class="list-group-item disabled">SessionKey, LangParam und nlID</a>
                    <a href="#" class="list-group-item disabled">Token</a>
                    <a href="#" class="list-group-item disabled">API Access</a>
                    <a href="#" class="list-group-item disabled">Berechtigungen (fnSimpleuser, fnRechte2Rolle, fnRolle2User)</a>
                    <a href="#" class="list-group-item disabled">Mobil (fnAndroid)</a>
                    <a href="#" class="list-group-item disabled">POST oder GET</a>
                    <a href="#" class="list-group-item disabled">Ausgabeformate JSON, XML oder Text</a>
                    <a href="#" class="list-group-item disabled">Arbeiten ohne API Beschreibung (Entwicklertools)</a>
                    <a href="#" class="list-group-item disabled">Kontakt</a>
            </div>
            <div class="alert alert-info" role="alert">Um diese API zu benutzen, empfehlen wir ein grobes Verständnis im Umgang mit RESTful Webservices und deren Konzepte.</div>
            <!--<div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>-->
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="stammdaten_overview" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">'.l8n::getText("stammdaten").'</h2>
                <h3 class="section-subheading-n text-muted">'.l8n::getText("stammdaten_subtext").'</h3>
            </div>
            <div class="row">
                <h4 class="section-heading">'.l8n::getText("function_overview").'</h4>
                <div class="list-group">
                ##STAMMDATEN##
                <!--
                    <a href="#stammdaten_detail" class="list-group-item page-scroll"><span class="badge">14</span>Fahrer</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Aufträge</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Positionen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Unterpositionen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Kunden</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Touren</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Gebiete</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Bearbeitungshinweise</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Bearbeitungsryhtmen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Kataloge</a>-->
                </div>
            </div>
        </div>
    </section>
    
    ##FCSTAMMDATEN##
    
    <section id="ergebnisse_overview" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">'.l8n::getText("ergebnisse").'</h2>
                <h3 class="section-subheading-n text-muted">'.l8n::getText("ergebnisse_subtext").'</h3>
            </div>
            <div class="row">
                <h4 class="section-heading">'.l8n::getText("function_overview").'</h4>
                <div class="list-group">
                ##ERGEBNISSE##
                <!--
                    <a href="#stammdaten_detail" class="list-group-item page-scroll"><span class="badge">14</span>Fahrer</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Aufträge</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Positionen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Unterpositionen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Kunden</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Touren</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Gebiete</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Bearbeitungshinweise</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Bearbeitungsryhtmen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Kataloge</a>-->
                </div>
            </div>
        </div>
    </section>
    
    ##FCERGEBNISSE##
    
    <section id="einstellungen_overview" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">'.l8n::getText("einstellungen").'</h2>
                <h3 class="section-subheading-n text-muted">'.l8n::getText("einstellungen_subtext").'</h3>
            </div>
            <div class="row">
                <h4 class="section-heading">'.l8n::getText("function_overview").'</h4>
                <div class="list-group">
                ##EINSTELLUNGEN##
                <!--
                    <a href="#stammdaten_detail" class="list-group-item page-scroll"><span class="badge">14</span>Fahrer</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Aufträge</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Positionen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Unterpositionen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Kunden</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Touren</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Gebiete</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Bearbeitungshinweise</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Bearbeitungsryhtmen</a>
                    <a href="#" class="list-group-item"><span class="badge">14</span>Kataloge</a>-->
                </div>
            </div>
        </div>
    </section>
    
    ##FCEINSTELLUNGEN##
<!--
    <section id="stammdaten_detail" class="">
        <div class="container">
            <div class="row">
                <h2 class="section-heading">Fahrer</h2>
                <h3 class="section-subheading-n text-muted">Nachfolgend befinden sich alle Webservices zum Bereich Fahrer. (KLASSEN BESCHREIBUNG: Klasse benötigt für die Fahrer.)</h3>
            </div>
            <div class="row">
               
                
                <div class="panel panel-default">
                    <div class="panel-heading bold"><i class="fa fa-globe fa-blue"></i> fnDrivers.load (FUNKTIONSBESCHREIBUNG: Laden von Fahrern.)</div>
                    <div class="panel-body">Parameterbeschreibungen
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Typ</th>
                            <th>Beschreibung</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>userID</td>
                            <td>integer</td>
                            <td>ID des spaau href="#fnsimpleuser_insert">Benutzers(Fahrer) spazu aus der Datenbank z.B. 1.</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading bold">Beispielaufruf - HTTP Method GET</div>
                    <div class="panel-body">
                        <code>https://YOURSYSTEM/trace2/service.php?function=trace2.fnDrivers.load&userID=INTEGER VALUE&format=json</code>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading bold"><i class="fa fa-globe fa-blue"></i> fnDrivers.delete (FUNKTIONSBESCHREIBUNG: löschen von Fahrer.)</div>
                    <div class="panel-body">Keine Parameterbeschreibung vorhanden.</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading bold">Beispielaufruf - HTTP Method GET</div>
                    <div class="panel-body">
                        <code>https://YOURSYSTEM/trace2/service.php?function=trace2.fnDrivers.delete&format=json</code>
                    </div>
                </div>

            </div>
            
            
        </div>
    </section>
            -->
        

    <!-- About Section -->
    <!--<section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="_images/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="_images/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="_images/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="_images/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Team Section -->
    <!--<section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="_images/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Kay Garland</h4>
                        <p class="text-muted">Lead Designer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="_images/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="_images/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Diana Pertersen</h4>
                        <p class="text-muted">Lead Developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Clients Aside -->
    <!--<aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="_images/logos/envato.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="_images/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="_images/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="_images/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>
-->
    <!--<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>-->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; QITS 2014</span>
                </div>
                <div class="col-md-4">
                   <!-- <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>-->
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="http://www.qits.de">'.l8n::getText("foot_hilfe").'</a>
                        </li>
                        <li><a href="http://www.qits.de">'.l8n::getText("foot_kontakt").'</a>
                        </li>
                        <li><a href="http://www.qits.de">'.l8n::getText("foot_privacy_policy").'</a>
                        </li>
                        <li><a href="http://www.qits.de">'.l8n::getText("foot_terms_of_use").'</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive" src="_images/portfolio/roundicons-free.png" alt="">
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <p>
                                <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                            <ul class="list-inline">
                                <li>Date: July 2014</li>
                                <li>Client: Round Icons</li>
                                <li>Category: Graphic Design</li>
                            </ul>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Heading</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="_images/portfolio/startup-framework-preview.png" alt="">
                            <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                            <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="_images/portfolio/treehouse-preview.png" alt="">
                            <p>Treehouse is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. This is bright and spacious design perfect for people or startup companies looking to showcase their apps or other projects.</p>
                            <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/treehouse-free-psd-web-template/">FreebiesXpress.com</a>.</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="_images/portfolio/golden-preview.png" alt="">
                            <p>Start Bootstraps Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                            <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="_images/portfolio/escape-preview.png" alt="">
                            <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                            <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-responsive img-centered" src="_images/portfolio/dreams-preview.png" alt="">
                            <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                            <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticker">
      <p>This is the sticky thingy that is really cool.</p>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="_js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="_js/classie.js"></script>
    <script src="_js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="_js/jqBootstrapValidation.js"></script>
    <script src="_js/contact_me.js"></script>
    
    <script src="_js/jquery.sticky.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="_js/agency.js"></script>
    
</body>

</html>
';

