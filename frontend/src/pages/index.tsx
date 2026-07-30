import Link from 'next/link';

const homeFeatures = [
  'Shop categories',
  'Featured collections',
  'Top-selling products',
  'Filter by brand, price, rating, sale'
];

export default function Home() {
  return (
    <main className="min-h-screen bg-gray-50">
      <section className="bg-white shadow-md rounded-b-3xl rounded-tr-3xl p-8">
        <h1 className="text-4xl font-bold text-gray-900">ShopG E-commerce</h1>
        <p className="text-lg text-gray-600 mt-3">
          Streamlined cart flow, secure checkout, and admin insights for modern retail.
        </p>
        <div className="mt-6 grid gap-4 md:grid-cols-2">
          {homeFeatures.map((feature) => (
            <article key={feature} className="rounded-2xl border border-gray-200 p-4">
              <h3 className="font-semibold text-gray-800">{feature}</h3>
            </article>
          ))}
        </div>
        <div className="mt-8 flex gap-4">
          <Link className="rounded-full bg-blue-600 px-6 py-3 text-white" href="/products">
            Browse products
          </Link>
          <Link className="rounded-full border border-blue-600 px-6 py-3 text-blue-600" href="/login">
            Login
          </Link>
        </div>
      </section>
    </main>
  );
}
