from django.conf.urls import patterns, include, url
import os
# Importing the correct settings file for the environment
if os.environ['HOME'] == '/home/brianalexander':
    import settings_production
    settings_path = settings_production
elif os.environ['HOME'] == '/Users/Brian':
    import settings_local
    settings_path = settings_local

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
                       url(r'^(?:index)?$', 'main.views.index'),
                       url(r'^resume(?:\.html)?$', 'resume.views.index'),
                       url(r'^stocks$', 'portfolio.views.index'),
                       url(r'^order/$', 'order.views.index'),
                       url(r'^contact/$', 'main.views.contact'),
                       url(r'^about/$', 'main.views.about'),
                       (r'^media/(?P<path>.*)$', 'django.views.static.serve',
                        {'document_root': settings_path.MEDIA_ROOT}),
                       (r'^static/(?P<path>.*)$', 'django.views.static.serve',
                        {'document_root': settings_path.STATIC_ROOT}),
                       url(r'^blog/', include('blog.urls')),
                       url(r'^admin/', include(admin.site.urls)),
                       )
