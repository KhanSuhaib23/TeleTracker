

from bs4 import BeautifulSoup

urls = []


pageNumber = 1

for pageNumber in range(1, 11):
    url = 'https://www.themoviedb.org/ tv/top-rated?page=' + str(pageNumber)
    page = urllib.request.urlopen(url)

    soup = BeautifulSoup(page, "lxml")

    show_list = soup.find('div', class_='results')

    for rows in show_list.findAll('div', class_='item poster card'):
        # print (rows)
        temp = rows.find('a', class_='result').attrs
        temp = temp['href']

        urls.append('https://www.themoviedb.org' + temp)


    np.save('url.npy', np.array(urls))




# count = []
#
# np.save('title.npy', count)
# np.save('img_src.npy', count)
# np.save('overview.npy', count)
# np.save('release_year.npy', count)

titles = np.load('title.npy').tolist()
image_sources = np.load('img_src.npy').tolist()
overviews = np.load('overview.npy').tolist()
release_years = np.load('release_year.npy').tolist()




urls = np.load('url.npy')

titles = np.load('title.npy').tolist()
image_sources = np.load('img_src.npy').tolist()
overviews = np.load('overview.npy').tolist()
release_years = np.load('release_year.npy').tolist()

count = np.load('last_count.npy')

for index in range(count, len(urls)):


    page = urllib.request.urlopen(urls[index])
    soup = BeautifulSoup(page, "lxml")

    show = soup.find('div', class_='custom_bg')

    title = show.findAll('span')[1].find('a').get_text()
    titles.append(title)

    image_source = show.find('div', class_='image_content').find('img').attrs['src']
    image_sources.append(image_source)

    overview = show.find('div', class_='overview').find('p').get_text()
    overviews.append(overview)

    release_year = show.find('span', class_='release_date').get_text()[1:-1]

    release_years.append(release_year)


    print (str(index + 1) + '/' + '200 completed')

    print('Saving Titles...')
    np.save('title.npy', np.array(titles))

    print('Saving Image Sources...')
    np.save('img_src.npy', np.array(image_sources))

    print('Saving Overviews...')
    np.save('overview.npy', np.array(overviews))

    print('Saving Release Years...')
    np.save('release_year.npy', np.array(release_years))

    np.save('last_count.npy', index + 1)

