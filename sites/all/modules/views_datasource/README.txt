$Id: README.txt,v 1.1.2.5 2009/10/07 15:28:03 allisterbeharry Exp $

Views Datasource README
---------------------------------------

Current Version
---------------
6.x-1.0-ALPHA3

Release Notes
-------------
Fixed:
 http://drupal.org/node/557282
 http://drupal.org/node/307223
 http://drupal.org/node/306066

Added Atom renderer to views_xml. Added SIOC renderer to views_rdf. Added 
hCalendar renderer to views_xhtml. Removed dependency of all plugins on 
the 'unformatted' row plugin. To upgrade from the previous version you should
first disable the module, delete the previous version's files, place the new
ver into the directry, then re-enable the mdule

About
-----
Views Datasource is a set of plugins for Views for rendering node content in a 
set of shareable, reusable data formats based on XML, JSON, and XHTML. These 
formats allow content in a Drupal site to be easily used as data sources for 
Semantic Web clients and web mash-ups. Views Datasource plugins output content 
from node lists created in Drupal Views as:
  1)XML data documents using schemas like OPML and Atom;
  2)RDF/XML data documents using vocabularies like FOAF and SIOC;
  3)JSON data documents in plain JSON or in a format like MIT Simile/Exhibit;
  4)XHTML data documents using microformat like hCard and hCalendar
  
The project consists of 4 Views style plugins:
  1)views_xml - Output as raw XML, OPML, and Atom;
  2)views_json - Output as simple JSON and Simile/Exhibit JSON;
  3)views_rdf - Output as FOAF and SIOC;
  4)views_xhtml - Output as hCard and hCalendar.
  
In Drupal 6.x, to use these plugins you should:
1) Enable the module containing the format you want to render your views as. 
2) In the Views UI set the view style (in Basic Settings) to one of:
   i)  JSON data document (render as Simple JSON or Simile/Exhibit JSON)
   ii) XML data document (render as raw XML, OPML, and Atom)
   iii) RDF data document (render as FOAF or SIOC RDF)
   iv) XHTML data document (render as hCard or hCalendar XHTML)
3) In view style options choose the options or vocabulary for your format (like 
   raw or the OPML or Atom vocabulary for XML rendering.)
4) Add the fields to your view that contain the information you want to be 
   pulled into the format renderer:
   The Atom format requires the fields: node nid, title, posted date, 
   and updated date.
   The SIOC format requires the fields: node nid, type, title, body, posted date
5) That's it! The rendered view will be visible in the preview and at your 
   view's path. No Drupal markup is emitted, just the data for the particular 
   content type with the proper Content-Type HTTP header (like text/xml or
   application/rdf+xml)

A JSON data document will render the nodes generated by a view as a 
serialization of an array of Javascript objects with each object's properties 
corresponding to a view field. Simple JSON is just plain-vanilla JSON 
serialization usable in most apps while Simile/Exhibit JSON is the serialization
format used by the Exhibit web app - http://simile.mit.edu/exhibit/

An XML data document with render the nodes generated by a view as XML. The raw
XML format creates a root element called 'nodes' and then a 'node' child element
for each node in the view, with each node's child elements corresponding to a 
view field. OPML is a very simple XML schema useful for generating simple lists
(like lists of tracks in an music playlist.) Atom is a syndication schema with
similar intents as RSS. The following fields will bviews_rdf will render 
the nodes generated by a view as an RDF/XML FOAF document with each
<foaf:Person> element corresponding to a node in the view. To use just have
fields in the view named as their equivalent FOAF properties - for example to
have a <foaf:name> or <foaf:nick> element, have a field named 'name' and 'nick'
in your view. Similarly views_xhtml provides the hCard plugin which will render
each node in the XHTML hCard format - just have fields corresponding to hCard
properties defined in the view. For example to create an <email> element inside 
the <div class="hcard"> root element, just have one or more fields in the view
containing the text 'email'.

The FOAF and \hCard renderers are most useful with view based on user profiles 
where you can create profile fields corresponding to properties defined in the 
FOAF (http://xmlns.com/foaf/spec/) or hCard 
(http://microformats.org/wiki/hcard-cheatsheet) spec. However any node type 
(like those created with nodeprofile or Bio or Advanced Profile or Content
Profile) can be used in the view. It doesn't matter what data table the view
is base on, only what fields are exposed.
   
TODO
----
Proper theming
Use field labels instead of internal field  names
