from django.conf.urls import patterns, include, url
import settings

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    url(r'^(?:index)?$', 'main.views.index'),
    url(r'^order/$', 'order.views.index'),
    url(r'^contact/$', 'main.views.contact'),
    url(r'^about/$', 'main.views.about'),
    (r'^media/(?P<path>.*)$', 'django.views.static.serve',
                 {'document_root': settings.MEDIA_ROOT}),
    (r'^static/(?P<path>.*)$', 'django.views.static.serve',
                 {'document_root': settings.STATIC_ROOT}),
    url(r'^blog/', include('blog.urls')),
    url(r'^admin/', include(admin.site.urls)),
)
