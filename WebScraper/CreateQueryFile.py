# import urllib.request
# # import urllib.urlretrieve
import numpy as np

import re


insertQ = open('insert_queries.txt','w', encoding='utf-8')

titles = np.load('title.npy')
image_sources = np.load('img_src.npy')
overviews = np.load('overview.npy')
release_years = np.load('release_year.npy')

count = len(titles)

for i in range(count):
    title = '\'' + titles[i].replace("'", "\\'") + '\''
    image_source = '\'' + image_sources[i].replace("'", "\\'") + '\''
    overview = '\'' + overviews[i].replace("'", "\\'") + '\''
    release_year = '\'' + release_years[i].replace("'", "\\'") + '\''

    str = 'insert into shows values(' + title + ',' + release_year + ',' + image_source + ',' + overview + ', 0.0, 0.0, 0, 0, 0, 0' + ');\n'
    print (str)

insertQ.close()