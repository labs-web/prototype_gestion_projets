---
layout: rapport
order: 1
---

# Rapports

<a href="{{ site.baseurl }}/pkg_global/rapport"> Rapport globale </a> 

## Par packages

<ul>
  {% for package in site.data.modules %}
    <li> <a href="{{ site.baseurl }}/{{ package.name }}/rapport"> {{ package.titre }} </a> </li>
  {% endfor %}
</ul>
