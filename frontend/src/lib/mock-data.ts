export const productCards = [
  {
    id: 1,
    name: 'Aurora Wireless Headphones',
    slug: 'aurora-wireless-headphones',
    price: 189.99,
    salePrice: 149.99,
    brand: 'Soundcraft',
    category: 'Audio',
    rating: 4.8,
    reviews: 826,
    image:
      'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=700&q=80',
    tags: ['Top selling', 'New']
  },
  {
    id: 2,
    name: 'Onyx Smart Watch',
    slug: 'onyx-smart-watch',
    price: 249.5,
    brand: 'PulseLab',
    category: 'Wearables',
    rating: 4.7,
    reviews: 410,
    image:
      'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=700&q=80',
    tags: ['Trending']
  }
];

export const mockHome = {
  banners: [
    {
      id: 'hero',
      title: 'Experience ShopG',
      subtitle: 'Curated catalog, instant checkout, and admin-ready insights.',
      image:
        'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=1400&q=80'
    }
  ],
  categories: [
    { id: 'audio', name: 'Audio', image: 'https://images.unsplash.com/photo-1470229538611-16ba8c7ffbd7?auto=format&fit=crop&w=900&q=80' }
  ],
  featured: productCards,
  topSelling: productCards
};

export const mockCart = {
  currency: 'USD',
  items: [
    {
      product: productCards[0],
      quantity: 1,
      total: 149.99
    }
  ],
  shipping: 12,
  discount: 10,
  grandTotal: 151.99
};

export const mockUser = {
  name: 'Maya Patel',
  orderCount: 4,
  rewardPoints: 820
};
