from django.conf.urls import patterns, include, url
from django.views.generic import DetailView, ListView
from blog.models import Blog

urlpatterns = patterns('',
    (r'^$', 'blog.views.index'),
url(
    r'^blog/view/(?P<slug>[^\.]+).html',
    'blog.views.view_post',
    name='view_blog_post'),
url(
    r'^blog/category/(?P<slug>[^\.]+).html',
    'blog.views.view_category',
    name='view_blog_category'),
)
